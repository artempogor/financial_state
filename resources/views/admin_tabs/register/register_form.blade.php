<x-guest-layout>
    <div class="  bg-white p-16 text-center mx-auto border">
       {{url()->previous()}}
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div>
                <x-label for="name" class="text-left" :value="__('Name')" />

                <x-input id="name" class="block mt-1 " type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" class="text-left" :value="__('ИКЮЛ')" />

                <x-input id="email" class="block mt-1 " type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" class="text-left" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-250"
                         type="password"
                         name="password"
                         value="{{Str::random()}}"
                         required autocomplete="new-password" />
            </div>
            <!-- Confirm Password -->
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Зарегистрировать пользователя') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
