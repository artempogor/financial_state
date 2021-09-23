<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans antialiased">
    @include('layouts.navigation')
    <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <div class="m-3 md:grid grid-cols-1 grid-rows-1  bg-white gap-2 p-2 rounded">
                <p class="md:text-center text-2xl p-2">Регистрация пользователя</p>

                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('register') }}">
                    @if (session('status'))
                        <div class="flex items-center bg-blue-500 text-white text-bg font-bold px-4 py-3  rounded" role="alert">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif
                    @csrf
                        <div class="mt-4">
                        <x-label for="login" class="" :value="__('Логин')" />

                        <x-input id="login" class="block mt-1 w-full " type="text" name="login" :value="old('login')" required autofocus />
                    </div>
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="ikul" class="text-left" :value="__('ИКЮЛ')" />

                        <x-input id="ikul" class="block mt-1 w-full " type="text" name="ikul" :value="old('ikul')"  />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" class="text-left" :value="__('Password')" />
                        <x-input id="text" class="block mt-1 w-full"
                                 type="text"
                                 name="password"
                                 value="{{Str::random(8)}}"
                                 required autocomplete="new-password" />
                    </div>
                    <!-- Confirm Password -->
                        <div class="flex items-center justify-end mt-4 m-1">

                        <x-button class="flex items-center justify-end mt-4">
                            {{ __('Зарегистрировать пользователя') }}
                        </x-button>
                        </div>
                </form>
            </div>

    </main>
</body>
</html>
