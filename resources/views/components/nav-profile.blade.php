<a class="flex items-center mt-2 py-2 px-5 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
<div x-data="{ dropdownOpen: false }" class="relative">
    <button @click="dropdownOpen = ! dropdownOpen"
            class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
        <img class="h-full w-full object-cover"
             src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
             alt="Your avatar">
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
         style="display: none;"></div>
    <span class="mx-1   py-2 px-6  bg-opacity-25 text-gray-100 ">{{ Auth::user()->name }}</span>

    <div x-show="dropdownOpen"
         class="absolute right-6 mt-1 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
         style="display: none;">
        <a href="#"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white" >
            Logout
        </a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
</a>