<!-- Mobile Navbar -->
<div class="bg-gray-800 text-gray-100 flex justify-between md:hidden">
    <!-- logo -->
    <a href="#" class="block p-4 text-white font-bold">{{ config('app.name') }}</a>

    <!-- mobile menu button -->
    <button class="mobile-menu-button p-4 focus:outline-none focus:bg-gray-700">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</div>

<!-- sidebar -->
<aside
    class="sidebar bg-blue-800 shadow-lg text-blue-100 w-64 space-y-6 py-7 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">

    <a href="{{ route('dashboard') }}" class="text-white flex flex-row justify-center items-center space-x-2 px-4">
        <span class="text-2xl font-bold text-center">{{ config('app.name') }}</span>
    </a>

    <div class="mt-2 border-t border-white">
        @include('common.menu-link',['title' => trans('app.catalog'),'subItems' => [
          generateLink('app.catalog-sub.categories',route('category.index'))
        ], 'isActive' => isActiveRouteByName('category')])

    </div>
</aside>
