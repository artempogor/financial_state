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
    <main class="container mx-auto px-10 py-12 bg-gray-100">
        <x-guest-layout>
            <div class="container mx-auto px-8 py-8">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('register') }}">
                    @if (session('status'))
                        <div class="flex items-center bg-blue-500 text-white text-bg font-bold px-4 py-3" role="alert">
                            <p>{{ session('status') }}</p>
                        </div>
                    @endif
                    @csrf
                    <div>
                        <x-label for="login" class="text-left" :value="__('Логин')" />

                        <x-input id="login" class="block mt-1 " type="text" name="login" :value="old('login')" required autofocus />
                    </div>
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="ikul" class="text-left" :value="__('ИКЮЛ')" />

                        <x-input id="ikul" class="block mt-1 " type="text" name="ikul" :value="old('ikul')"  />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" class="text-left" :value="__('Password')" />
                        <x-input id="text" class="block mt-1 w-250"
                                 type="text"
                                 name="password"
                                 value="{{Str::random(8)}}"
                                 required autocomplete="new-password" />
                    </div>
                    <!-- Confirm Password -->
                    <div class="mt-4 float-left">
                        <x-button class="mt-4">
                            {{ __('Зарегистрировать пользователя') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-guest-layout>

    </main>
</body>
</html>
