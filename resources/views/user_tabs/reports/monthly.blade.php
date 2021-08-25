<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
@include('layouts.navigation')

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
        <div class="container mx-auto px-6 py-8">
            <div class="grid place-items-left h-96 text-gray-500 dark:text-gray-300 text-xl">
                    <!--actual component start-->
                @include('user_tabs.reports.button_group')
                <template>
                    <hot-table :data="data" :rowHeaders="true" :colHeaders="true"></hot-table>
                </template>
                    <div x-data="setup()">
                        <ul class="flex justify-left items-center my-4">
                            <template x-for="(tab, index) in tabs" :key="index">
                                <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                                    :class="activeTab===index ? 'text-gray-500 border-gray-800' : ''" @click="activeTab = index"
                                    x-text="tab"></li>
                            </template>
                        </ul>
                        <div class="  bg-white p-16 text-center mx-auto border">
                            <div x-show="activeTab===0">
                                wfwf
                            </div>
                            <div x-show="activeTab===1">Content 2</div>
                        </div>
                    </div>
                <div id="example">cscv</div>

            </div>
        </div>
    </main>
</div>

</body>

</html>
