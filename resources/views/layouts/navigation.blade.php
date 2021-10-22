<div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-200">
    <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex items-center">
                <a href="/" class="text-white text-2xl mx-2 font-semibold">{{config('app.name')}}</a>
            </div>
        </div>
        @include('profile.nav-profile')
        @hasanyrole('user|master_user')
        <nav class="mt-20">
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
            <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
            </svg>
            <span class="mx-3">Отчёты</span>
                        </span>
                <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
            </button>

            <div x-show="open" class="bg-gray-700">
                <a href="{{route('monthly')}}" class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white">Месячные </a>
                <a href="{{route('quarterly')}}"  class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white" href="#">Квартальные</a>
            </div>
        </div>
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
            <svg class="h-8 w-8 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,13 2,6" /></svg>

            <span class="mx-3">Письма</span>
                        </span>

                <span>

                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
            </button>

            <div x-show="open" class="bg-gray-700">
                <a class="py-3 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white" href="#">Сопроводительное письмо</a>
            </div>
        </div>
        </nav>
        @endhasanyrole
        @hasrole('admin')
        <nav class="mt-20">
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
      <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
      </svg>
            <span class="mx-3">Организации</span>
                        </span>

                <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
            </button>
            <div x-show="!open" class="bg-gray-700">
                <a class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white" href=""{{route('dashboard')}}"">Обмен валют </a>
                <a class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white" href="#">Ломбард</a>
                <a class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white" href="#">Микрофинансовые организации</a>
                <a class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white" href="#">Субъекты страхового дела</a>
            </div>
        </div>
        <a href="{{route('register')}}"  class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
        <svg class="h-8 w-8 text-white"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
        </svg>

            <span class="mx-3">Регистрация пользователей</span>
                        </span>

        </a>
        </nav>
        @endhasrole
    </div>

