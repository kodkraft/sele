<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sele | {{$title ?? ''}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css?id=' . uniqid()) }}">
    @stack('css')
</head>
<body class="theme-blue">

<div class="relative min-h-screen md:flex">
    @include('layouts.partials.sidebar')
    <div class="flex-1">
        @include('layouts.partials.navbar')
        @yield('content')
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
<script>
    // grab everything we need
    const btn = document.querySelector(".mobile-menu-button");
    const btnToggle = document.querySelector("#sidebar-menu-toggle");
    const menuToggle = document.querySelector("#menu-toggle");
    const sidebar = document.querySelector(".sidebar-menu");
    const sidebarLogo = document.querySelector("#sidebar-logo");
    const container = document.querySelector("#container");

    // add our event listener for the click
    btn.addEventListener("click", () => {
        toggleSideBar(true);
    });

    btnToggle.addEventListener("click", () => {
        toggleSideBar();
    });

    menuToggle.addEventListener("click", () => {
        toggleSideBar();
    });

    function toggleSideBar(isMobile = false) {
        if (isMobile) {
            sidebar.classList.toggle("-translate-x-full");
        }

        sidebar.classList.toggle("md:relative");
        sidebar.classList.toggle("md:translate-x-0");
        menuToggle.classList.toggle('md:hidden');
        menuToggle.classList.toggle('md:flex');
        container.classList.toggle('container');
    }

    @if(Session::has('success'))
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '{{session('success')}}',
        showConfirmButton: false,
        timer: 1500
    })
    @endif

</script>
</body>
</html>
