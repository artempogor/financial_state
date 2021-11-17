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
                    <div>
                    </div>
                </div>
{{--                <div x-data="tabs()">--}}
{{--                        <ul class="flex justify items-center m-4 my-4">--}}
{{--                            <template x-for="(tab, index) in tabs" :key="index">--}}
{{--                                <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"--}}
{{--                                    :class="activeTab===index ? 'text-gray-500 border-gray-800' : ''" @click="activeTab = index"--}}
{{--                                    x-text="tab"></li>--}}
{{--                            </template>--}}
{{--                        </ul>--}}
{{--                            <div x-show="activeTab===0">--}}
{{--                                <div id="report1" class="hot m-5"></div>--}}
{{--                                <div id="report2" class="hot mt-10 m-5"></div>--}}
{{--                            </div>--}}
{{--                            <div x-show="activeTab===1">--}}

{{--                            </div>--}}
{{--                <div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        </div>
    </main>
</div>

</body>
</html>
