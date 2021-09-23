<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
        window.globalVariables =  {a:'{{Auth::user()->login}}'}
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')
    <main class="flex-1 overflow-x-hidden overflow-y-auto">
        <div class="m-3 md:grid grid-cols-1 grid-rows-1  bg-white gap-2 p-2 rounded">
            @include('user_tabs.reports.button_group')
            <div class="grid place-items h-150 text-gray-500 dark:text-gray-300 text-xl">
                    <div x-data="tabs()">
                        <ul class="flex justify items-center my-4">
                            <template x-for="(tab, index) in tabs" :key="index">
                                <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                                    :class="activeTab===index ? 'text-gray-500 border-gray-800' : ''" @click="activeTab = index"
                                    x-text="tab"></li>
                            </template>
                        </ul>
                            <div x-show="activeTab===0">
                                <div class="shadow overflow-hidden rounded border-gray-800">
                                    @include('user_tabs.reports.table')
                                </div>

                            </div>
                            <div x-show="activeTab===1">
                                <div id="example1" class="hot"></div>
                                <div class="m-3 right-1">
                                    <div
                                            class='hidden'
                                            data-name='{{Auth::user()->name}}'
                                    ></div>
                                    <button id="export-file" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                        <span class="mr-2">Загрузить</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                                        </svg>
                                    </button>
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
<script>
    function tabs() {
        return {
            activeTab: 0,
            tabs: [
                "Форма 0101",
                "Форма 0102",
            ]
        };
    }
</script>
</html>
