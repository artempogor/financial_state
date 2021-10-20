<div class="m-3 md:grid grid-cols-1 grid-rows-1  bg-white gap-2 p-2 rounded">
    <p class="md:text-center text-2xl p-2">Cмена пароля</p>
    @if (session('status'))
        <div class="flex items-center bg-blue-500 text-white text-bg font-bold px-4 py-3  rounded" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('status') }}</p>
        </div>
    @endif

    @if ( session()->has('error') )
        <div class="flex items-center bg-red-400 text-white text-bg font-bold px-4 py-3 rounded-xl" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    @if ( $errors->any() )
        <div class="alert alert-danger">
            <ul class="edit-profile">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('password.change',Auth::user() ) }}">
    @csrf
    @method("PUT")
        <div>
            <x-label for="old_password" :value="__('Действующий пароль')" />
            <div class="py-2" x-data="{ show: true }">
                <div class="relative">
                    <input name="old_password" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 ">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg class="h-6 w-6 text-black" @click="show = !show"
                             :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />  <circle cx="12" cy="12" r="3" /></svg>
                        <svg class="h-6 w-6 text-black"  fill="none" @click="show = !show"
                             :class="{'block': !show, 'hidden':show }" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <x-label for="password" :value="__('Новый пароль')" />
            <div class="py-2" x-data="{ show: true }">
                <div class="relative">
                    <input name="password" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 ">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg class="h-6 w-6 text-black" @click="show = !show"
                             :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />  <circle cx="12" cy="12" r="3" /></svg>
                        <svg class="h-6 w-6 text-black"  fill="none" @click="show = !show"
                             :class="{'block': !show, 'hidden':show }" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 ">
            <x-label for="password_confirmation" :value="__('Подтверждение нового пароля')" />
            <div class="py-2" x-data="{ show: true }">
                <div class="relative">
                    <input name="password_confirmation" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 ">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg class="h-6 w-6 text-black" @click="show = !show"
                             :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />  <circle cx="12" cy="12" r="3" /></svg>
                        <svg class="h-6 w-6 text-black"  fill="none" @click="show = !show"
                             :class="{'block': !show, 'hidden':show }" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Cменить пароль') }}
            </x-button>
        </div>
    </form>
</div>