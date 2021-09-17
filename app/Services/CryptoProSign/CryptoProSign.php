<?php


namespace App\Services\CryptoProSign;


use AdamBrett\ShellWrapper\Command\Builder as CommandBuilder;
use AdamBrett\ShellWrapper\Runners\Exec;
use AdamBrett\ShellWrapper\Runners\Passthru;
use AdamBrett\ShellWrapper\Runners\ShellExec;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class CryptoProSign
{
    private $thumbprint = '';
    private $isInstalled = false;
    private $signFolder;
    private $pathToSig;
    public $errorMsg = [];
    private $certmgrPath = '/opt/cprocsp/bin/amd64/certmgr';
    private $cryptcpPath = '/opt/cprocsp/bin/amd64/cryptcp';

    function __construct($config = null)
    {
        if (isset($config['certmgrPath'])) $this->certmgrPath = $config['certmgrPath'];
        if (isset($config['cryptcpPath'])) $this->certmgrPath = $config['cryptcpPath'];
    }


    /**
     * Проверка установлен ли криптопро или сертификат
     * @return bool
     */
    private function checkIsInstalled()
    {
        $installStatus = $this->isInstalled();
        if ($installStatus['status'] === 'error') {
            Log::error($installStatus['msg']);
            return false;
        }
        return true;
    }


    private function isInstalled()
    {
        $shell = new Exec();

        $command = new CommandBuilder($this->certmgrPath);
        $command->addFlag('help');
        $response = $shell->run($command);
        if ($response !== '[ErrorCode: 0x00000000]') {
            return [
                'status' => 'error',
                'msg'    => "Невозможно выполнить: " . $command . " Возможно, не установлен certmgr"
            ];
        }

        $command2 = new CommandBuilder($this->cryptcpPath);
        $command2->addFlag('help');
        $response = $shell->run($command2);

        if ($response !== '[ErrorCode: 0x00000000]') {
            return [
                'status' => 'error',
                'msg'    => "Невозможно выполнить: " . (string)$command . " Возможно, не установлен cryptcp"
            ];
        }

        return [
            'status' => 'success',
        ];
    }

    /**
     * @param $thumbprint string
     * @return array|false
     */
    public function showSignByThumb(string $thumbprint)
    {
        if (!$this->checkIsInstalled()) return false;

        $shell = new ShellExec();
        $command = new CommandBuilder($this->certmgrPath);
        $command->addFlag('list')
            ->addFlag('thumbprint', $thumbprint);

        $return = $shell->run($command);

        if(!str_contains($return, '[ErrorCode: 0x00000000]')) {
            Log::error("Не удалось выполнить: " . $command);
            Log::info("Полученный ответ: " . $return);
            return false;
        }

        $splitted = explode('=============================================================================', $return);

        $body = $splitted[1];

        $strings = explode(PHP_EOL, $body);
        $data = [];
        foreach ($strings as $string) {
            if (str_contains($string, ' :')) {
                $tempArr = explode(' :', $string);
                $data[trim($tempArr[0])] = trim($tempArr[1]);
            }
        }

        return $data;
    }

    /**
     * Получения CN из SubjectID Not valid after - срок  действия сертификата ( до)
     */
    public function showExtraParams($thumbprint)
    {
        $cert = $this->showSignByThumb($thumbprint);
        if ($cert === false) return false;

        $subjectCert = $cert['Subject'] ?? $cert['Субъект'];
        $notValidAfterCert = $cert['Not valid after'] ?? $cert['Истекает'];


        $subject = collect(explode(', ', $subjectCert))->first(function ($value, $key) {
            return str_contains($value, 'CN=');
        });
        $arr = explode("=", $subject);
        $cn = !empty($arr) ? $arr[1] : null;

        $data = [
            'CN' => $cn,
            'Not valid after' => $notValidAfterCert,
        ];
        return $data;
    }

    public function showSignList()
    {
        if (!$this->checkIsInstalled()) return false;

        $shell = new ShellExec();
        $command = new CommandBuilder($this->certmgrPath);
        $command->addFlag('list');

        $return = $shell->run($command);
        if(!str_contains($return, '[ErrorCode: 0x00000000]')) {
            Log::error("Не удалось выполнить: " . $command);
            Log::info("Полученный ответ: " . $return);
            return false;
        }

        $splitted = explode('=============================================================================', $return);

        $body = $splitted[1];

        $certs = preg_split('/\d+-------/', $body);

        $data = [];
        foreach ($certs as $cert) {
            if (empty(trim($cert))) continue;
            $temp = [];
            $strings = explode(PHP_EOL, $cert);
            foreach ($strings as $string) {
                if (str_contains($string, ' :')) {
                    $tempArr = explode(' :', $string);
                    $temp[trim($tempArr[0])] = trim($tempArr[1]);
                }
            }
            $data[] = $temp;
        }

        return $data;
    }

    public function sign(Request $request, $thumbprint, $pass = null)
    {
        if ($request->isMethod('post') && $request->file('userfile')) {

            $file = $request->file('userfile');
            $upload_folder = '';
            $filename = $file->getClientOriginalName(); // image.jpg

            $filePath = Storage::putFileAs($upload_folder, $file, $filename);

            if (!$this->checkIsInstalled()) return false;
            Log::info("filePath: " . $filePath);
            if (!File::exists($filePath)) {
                Log::error("Не найден файл для подписи: " . $filePath);
                return false;
            }

            $command = $this->cryptcpPath;
            $command .= " -sign -detached -nochain -norev -thumbprint '$thumbprint' ";
            $command .= " -file '" . $filePath . ".sig' " . "'" . $filePath . "'";
            $command .= ' -fext sig';

            if ($pass) $command .= " -pin '" . $pass . "'";


            $command2 = $this->cryptcpPath;
            $command2 .= " -sign -nochain -norev -thumbprint '$thumbprint' -detached ";
            $command2 .= " --file '" . $filePath . ".sig' " . "'" . $filePath . "'";
            $command2 .= ' -fext sig';

            if ($pass) $command2 .= " -pin '" . $pass . "'";
            $return = shell_exec($command);

            if (!str_contains($return, '[ErrorCode: 0x00000000]')) {
                Log::error("Не удалось выполнить: " . $command);
                Log::info("Полученный ответ: " . $return);

                //@FIXME  2й вид команды
                $return = shell_exec($command2);
                if (!str_contains($return, '[ErrorCode: 0x00000000]')) {
                    Log::error("Не удалось выполнить: " . $command2);
                    Log::info("Полученный ответ: " . $return);
                    return false;
                }
            }
        }
        return true;
    }

    public function signWithExtReplace($filePath, $thumbprint, $pass = null, $prefix = null)
    {
        if (!$this->checkIsInstalled()) return false;
        Log::info("filePath: " . $filePath);
        if (!File::exists($filePath)) {
            Log::error("Не найден файл для подписи: " . $filePath);
            return false;
        }

        $signedFile = self::replaceExtension($filePath, $prefix);

        $command3 = $this->cryptcpPath;
        $command3 .= " -sign -thumbprint '$thumbprint' -detach -nochain -norev ";
        if ($pass) $command3.= " -pin '" . $pass . "' ";
        $command3 .= " '" . $filePath . "' '" . $signedFile . "'";




        $command = $this->cryptcpPath;
        $command .= " -sign -detached -nochain -norev -thumbprint '$thumbprint' ";
        $command .= " -file '" . $signedFile . "' '" . $filePath . "'";
//        $command .= " -file '" . $filePath . ".sig' " . "'" . $filePath . "'";
        $command .= ' -fext sig';

        if ($pass) $command.= " -pin '" . $pass . "'";


        $command2 = $this->cryptcpPath;
        $command2 .= " -sign -nochain -norev -thumbprint '$thumbprint' -detached ";
//        $command2 .= " --file '" . $filePath . ".sig' " . "'" . $filePath . "'";
        $command2 .= " --file '" . $signedFile . "' '" . $filePath . "'";
        $command2 .= ' -fext sig';

        if ($pass) $command2.= " -pin '" . $pass . "'";
//        $return = shell_exec($command);


        $return = shell_exec($command3);
        if(!str_contains($return, '[ErrorCode: 0x00000000]')) {
            Log::error("Не удалось выполнить: " . $command3);
            Log::info("Полученный ответ: " . $return);
            return false;
        }


//        if(!str_contains($return, '[ErrorCode: 0x00000000]')) {
//            Log::error("Не удалось выполнить: " . $command);
//            Log::info("Полученный ответ: " . $return);
//
//            //@FIXME  2й вид команды
//            $return = shell_exec($command2);
//            if(!str_contains($return, '[ErrorCode: 0x00000000]')) {
//                Log::error("Не удалось выполнить: " . $command2);
//                Log::info("Полученный ответ: " . $return);
//                return false;
//            }
//        }

        return true;
    }

    public function verifySign($filePath, $thumbprint)
    {
        if (!$this->checkIsInstalled()) return false;
        if (!File::exists($filePath)) {
            Log::error("Не найден проверяемый файл: " . $filePath);
            return false;
        }

        $str = $this->cryptcpPath;
        $str .= " -verify -nochain -norev -detached -thumbprint '$thumbprint' ";
        $str .= " -fext 'sig' --file '" . $filePath . ".sig' " . "'" . $filePath . "'";

//        $return = $shell->run($command);
        $return = shell_exec($str);

        if(!str_contains($return, '[ErrorCode: 0x00000000]')) {
//            Log::error("Не удалось выполнить: " . $command);
            Log::error("Не удалось выполнить: " . $str);
            Log::info("Полученный ответ: " . $return);
            return false;
        }

        return true;
    }

    public function verifySignWithExtReplace($filePath, $thumbprint)
    {

        if (!$this->checkIsInstalled()) return false;
        if (!File::exists($filePath)) {
            Log::error("Не найден проверяемый файл: " . $filePath);
            return false;
        }

        $signedFile = self::replaceExtension($filePath);

        $str = $this->cryptcpPath;
        $str .= " -verify -nochain -norev -detached -thumbprint '$thumbprint' ";
        $str .= " '" . $filePath . "' " . "'" . $signedFile . "'";

        $return = shell_exec($str);

        if(!str_contains($return, '[ErrorCode: 0x00000000]')) {
            Log::error("Не удалось выполнить: " . $str);
            Log::info("Полученный ответ: " . $return);
            return false;
        }

        return true;
    }

    /**
     * Получаем цепочку сертификатов у конкретной подписи
     * @param $filePath
     * @param $thumbprint
     * @return bool|array
     */
    public function checkRevoKedCertificate($filePath, $thumbprint)
    {
        if (!$this->checkIsInstalled()) return false;

        if (!File::exists($filePath)) {
            Log::error("Не найден проверяемый файл: " . $filePath);
            return false;
        }

        $command = $this->certmgrPath;
        $command .= ' -list -thumbprint \''.$thumbprint.'\' ';
        $command .= '-f \''.$filePath.'\'';

        $return = shell_exec($command);

        if(!str_contains($return, 'Цепочка сертификатов: Успешно проверена.')) {
            $splitted = explode('=============================================================================', $return);

            $body = $splitted[1];

            $cert = preg_split('/\d+-------/', $body)[1];

            $data = [];
            $strings = explode(PHP_EOL, $cert);
            foreach ($strings as $string) {
                if (str_contains($string, 'Цепочка сертификатов')) {
                    $tempArr = explode(':', $string) ?? explode(' :', $string);
                    $data[] = trim($tempArr[1]);
                }
            }

            Log::error("Не удалось выполнить: " . $command);
            Log::info("Полученный ответ: " . $return);
            return $data;
        }

        return true;
    }

    /**
     * Получаем отпечаток сертификата у подписи файла
     * @param $signedFilePath
     * @return string|null
     */
    public function getThumbPrint($signedFilePath)
    {
        if (!$this->checkIsInstalled()) return false;

        if (!File::exists($signedFilePath)) {
            Log::error("Не найден проверяемый файл: " . $signedFilePath);
            return false;
        }

        $command = $this->certmgrPath;
        $command .= ' -list ';
        $command .= '-file \''.$signedFilePath.'\'';

        $return = shell_exec($command);

        $splitted = explode('=============================================================================', $return);

        $body = $splitted[1];

        $cert = preg_split('/\d+-------/', $body)[1];

        $strings = explode(PHP_EOL, $cert);
        foreach ($strings as $string) {
            if (str_contains($string, 'Хэш SHA1') || str_contains($string, 'SHA1 отпечаток')
                || str_contains($string, 'SHA1 Thumbprint') || str_contains($string, 'SHA1 Hash')) {
                $tempArr = explode(':', $string) ?? explode(' :', $string);
                $thumb = trim($tempArr[1]);
            }
        }

        return  $thumb ?? null;
    }

    /**
     * Проверяем подписанные файлы и цепочку сертификатов
     * @param $filePath
     * @param $thumbprint
     * @param $signedFilePath
     * @return string|null
     */
    public function checkSignedFile($filePath, $signedFilePath, $thumbprint)
    {
        if (!$this->checkIsInstalled()) return false;

        if (!File::exists($filePath)) {
            Log::error("Не найден проверяемый файл: " . $filePath);
            return false;
        }

        if (!File::exists($signedFilePath)) {
            Log::error("Не найден проверяемый файл: " . $signedFilePath);
            return false;
        }

        $command = $this->cryptcpPath;
        $command .= ' -verify -thumbprint \''.$thumbprint.'\' ';
        $command .= '-file \''.$signedFilePath.'\' -detached \''.$filePath.'\' \''.$signedFilePath.'\'';

        $return = shell_exec($command);

        $cert = explode(PHP_EOL.PHP_EOL, $return)[2];
        $strings = explode(PHP_EOL, $cert);

        $errors = '';
        if (trim($strings[0]) !== 'Цепочки сертификатов проверены.') {
            $errors .= ' '.$strings[0];
        }
        if (trim($strings[4]) !== 'Подпись проверена.') {
            $errors .= ' '.$strings[4];
        }

        return $errors;
    }


    /**
     * Получение даты окончания сертификата подписанного документа
     * cryptcp -verify -f 1.txt.sig -detached  1.txt 1.txt.sig
     * @param $filePath
     * @param $signedFilePath
     * @return bool|string
     */
    public function getValidBeforeFromSignedFile($filePath, $signedFilePath) {
        if (!$this->checkIsInstalled()) return false;

        if (!File::exists($filePath)) {
            Log::error("Не найден проверяемый файл: " . $filePath);
            return false;
        }
        if (!File::exists($signedFilePath)) {
            Log::error("Не найден проверяемый файл: " . $signedFilePath);
            return false;
        }

        $str = $this->cryptcpPath;
        $str .= " -verify -nochain -norev -f '$signedFilePath' -detached ";
        $str .= " '" . $filePath . "' " . "'" . $signedFilePath . "'";

        $response = shell_exec($str);

        if(!str_contains($response, '[ErrorCode: 0x00000000]')) {
            Log::error("Не удалось выполнить: " . $str);
            Log::info("Полученный ответ: " . $response);
            return false;
        }

        $responseStrings = explode(PHP_EOL, $response);
        $dates = [];
        foreach ($responseStrings as $string) {
            if (str_contains($string, 'Valid from')) {
                $validStr = $string;
                $dates = explode(' to ', $validStr);
            }
            if (str_contains($string, 'Действителен с')) {
                $validStr = $string;
                $dates = explode(' по ', $validStr);
            }
        }

        return !empty($dates[1]) ? $dates[1] : false;
    }

    /**
     * Замена расширения файла на .sig, если передан префикс, то он добавляется перед .sig
     * @param $filePath string
     * @return string
     */
    public static function replaceExtension(string $filePath, string $prefix = null): string
    {
        $basename = File::basename($filePath);

        $basenameParts = explode('.', $basename);
        $newExtension = $prefix ? $prefix . '.sig' : 'sig';
        $basenameParts[count($basenameParts) - 1] = $newExtension;

        $newBasename = implode('.', $basenameParts);

        $filePathParts = explode(DIRECTORY_SEPARATOR, $filePath);
        $filePathParts[count($filePathParts) - 1] = $newBasename;

        return implode(DIRECTORY_SEPARATOR, $filePathParts);
    }
}
