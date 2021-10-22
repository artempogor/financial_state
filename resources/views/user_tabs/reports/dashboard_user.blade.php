<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <div class="m-3 md:grid grid-cols-1 grid-rows-1  bg-white gap-2 p-2 rounded">
        @include('user_tabs.reports.button_group_create')
        @if (session('status'))
            <div class="flex items-center bg-blue-500 text-white text-bg font-bold px-4 py-3 " role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{ session('status') }}</p>
                <button type="button" class="absolute right-0 m-5" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div x-data="tabs()">
            <ul class="flex justify items-center my-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                        :class="activeTab===index ? 'text-gray-500 border-gray-800' : ''" @click="activeTab = index"
                        x-text="tab"></li>
                </template>
            </ul>
            <div x-show="activeTab===0">
                <p class="md:text-center text-2xl p-5">Отчёт о курсах и объемах операций по обмену валют в наличной форме</p>
                @include('user_tabs.reports.table')
            </div>
            <div x-show="activeTab===1">
            </div>
            <div>
            </div>
        </div>
    </div>
</main>
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