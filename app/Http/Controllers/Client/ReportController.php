<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
//  ФОРМЫ В ИЮНЬ И ТД+ СОХРАНЕННЫЕ ФОРМЫ +УДАЛЕНИЕ ЗАПИСЕЙ В БД
//  ТОКЕН В СЕССИИ
//  фильтр по дате, передат ьвкладку  + ссылка удалить только черновики,
//  в бд удалить тоже + модальное окно потдверждения, только сохраненные воводить +печать пдф и в меню
    public function subscribeReports(Request $request)
    {
//        $request->validate([
//            'file' => 'required|file|mimes:json,pdf,zip',
//        ]);

        $subscribefile = $request->subscribe_file->storeAs('subscribe_file', $request->subscribe_file->getClientOriginalName());
         dd($request);
    }
    public function verify(Request $request)
    {
        $jsonString = file_get_contents(base_path('resources/test.json'));
        return response(json_decode($jsonString, true));
    }
}
