<nav class="mx-auto md:pl-5 flex flex-col md:flex-row justify-between bg-white w-full p-2 gap-4 shadow">
    <!-- Search -->
    <div class="flex-1 flex flex-row gap-2 items-center">
        <svg class="w-6 h-6 hidden md:hidden cursor-pointer" id="menu-toggle" fill="none" stroke="currentColor"
             viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>


    </div>
    <div class="w-full flex flex-row search-bar">
        <select
                id="full-text-search">
            <option> aaa</option>
            <option> aaa</option>
            <option> aaa</option>
            <option> aaa</option>
            <option> aaa</option>
            <option> aaa</option>
            <option> aaa</option>


        </select>
    </div>

    <!-- Authenticated User -->
    <div class="flex flex-row items-center gap-4 mr-2">
        <h1 class="text-sm text-gray-600">{{auth()->user()->name}}</h1>
        <a href="" class="border-l border-gray-200 pl-4">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
        </a>
    </div>
</nav>

@push('js')
    <script>
        $(document).ready(function () {
            $('#full-text-search').select2()
        });
    </script>
@endpush
