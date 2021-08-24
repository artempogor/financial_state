
<div>
    <a class="flex items-center mt-2 py-2 px-5 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
<div x-data="{ dropdownOpen: false }" class="relative">
    <button @click="dropdownOpen = ! dropdownOpen"
            class="relative block h-9 w-9 rounded-full overflow-hidden shadow focus:outline-none">
        <svg class="h-8 w-8 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </button>
    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-5"
         style="display: none;"></div>
    <span  @click="dropdownOpen = ! dropdownOpen" class="mx-1 py-2 px-6 bg-opacity-25 text-gray-100  ">{{ Auth::user()->name }}</span>
    <div x-show="dropdownOpen"class="absolute right-6 mt-1 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
        <a href="{{route(('profile.edit'))}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Профиль</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="block px-4 py-2 text-sm text-red-800 hover:bg-indigo-600 hover:text-white" >
            Выйти
        </a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div></div>
    <span class="mx-14 py-5 px-6  bg-opacity-25 text-gray-500 ">{{ Auth::user()->getRoleNames()->first()}}</span>
</a>
</div>