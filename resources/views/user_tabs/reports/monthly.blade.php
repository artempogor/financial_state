<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Финотчётность : {{$reports[0]}}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        window.globalVariables =  {ikul:'{{Auth::user()->ikul}}',time:'{{\Illuminate\Support\Carbon::today()->toDateString()}}',name_report:'{{$reports[0]}}'}
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')
    <main class="flex-1 overflow-x-hidden overflow-y-auto">
        <div class="m-3 md:grid grid-cols-1 grid-rows-1  bg-white gap-2 p-2 rounded">

            @include('user_tabs.reports.button_group')
            <div class="grid place-items h-150 text-gray-500 dark:text-gray-300 text-xl">
                <div class="overscroll-contain">

                <pre id="console" class="console text-purple-700 text-opacity-100 ml-5 ">После заполнения данных нажмите на кнопку "Загрузить"</pre>
                </div>
                <div>

                    <div>
                        <div id="report1" class="hot m-5"></div>
                        <div id="report2" class="hot mt-5 m-5"></div>
                    </div>
                    <div id="modal"
                         class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-gray-300 bg-opacity-50 transform scale-0 transition-transform duration-300">
                        <div class="modal-content relative m-auto bg-gray-100 w-2/5 shadow-lg">
                            <div class="p-4 bg-gray-900 text-white">
                                <span id = "closebutton" class="text-2xl closeBtn float-right text-lg font-bold hover:text-red-700 no-underline cursor-pointer">&times;</span>
                                <h2  class="text-xl">Загрузка подписанного файла</h2>
                            </div>
                            <div class="p-4">
                                <div class="grid grid-cols-1 mt-1 mx-7">
                                    <form action="{{ route('subscribe_reports') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class='flex items-center justify-center w-full'>
                                        <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                                            <div class="right flex flex-col items-center justify-center pt-2" >
                                                <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M7 18a4.6 4.4 0 0 1 0 -9h0a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />  <polyline points="9 15 12 12 15 15" />  <line x1="12" y1="12" x2="12" y2="21" /></svg>
                                            </div>
                                            <input type="file" name="subscribe_file" />
                                        </label>
                                    </div>
                                        <button type="submit"  class="mt-2 inset-y-0 right-100  bg-white text-gray-800 font-bold rounded border-b-2 border-gray-900 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                            <span class="mr-2">Отправить</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                                        </svg>
                                    </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
        </div>
        </div>
    </main>
</div>

</body>
</html>
