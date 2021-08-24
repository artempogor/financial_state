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
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Heading -->
            <!-- Page Content -->
                @hasrole('writer')
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                    <div class="container mx-auto px-6 py-8">
                        <div
                                class="grid place-items-center h-96 text-gray-500 dark:text-gray-300 text-xl border-4 border-gray-300 border-dashed">
                            Content
                        </div>
                    </div>
                </main>
                @else
                    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                        <div class="container mx-auto px-6 py-8">
                            <div
                                    class="grid place-items-center h-96 text-gray-500 dark:text-gray-300 text-xl border-4 ">
                                Content
                            </div>
                        </div>
                    </main>

                    @endhasrole
        </div>
    </body>
</html>
