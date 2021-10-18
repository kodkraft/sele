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
        <select class="rounded-l-lg focus:outline-none w-full pl-2 h-10 search-input"
                id="full-text-search">
        </select>
    </div>

    <!-- Authenticated User -->
    <div class="flex flex-row items-center gap-4 mr-2">
        <h1 class="text-sm text-gray-600">{{auth()->user()->name}}</h1>

    </div>
</nav>

@push('js')
    <script>
        $(document).ready(function () {
            $('#full-text-search').select2({
                data:{ text: "title" },
                ajax: {
                    url: '{{action([\App\Http\Controllers\Admin\FullTextSearchController::class,'index'])}}',
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: data.data,
                        };
                    }
                }
            })
        });
    </script>
@endpush
