<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css?id=' . uniqid()) }}">
</head>
<body>
<div class="relative min-h-screen md:flex">
    @include('layouts.partials.sidebar')
    <div class="flex-1">
        @include('layouts.partials.navbar')
        @yield('content')
    </div>
</div>
<script src="{{ asset('js/alpine.js') }}" defer></script>
<script>
    // grab everything we need
    const btn = document.querySelector(".mobile-menu-button");
    const sidebar = document.querySelector(".sidebar");

    // add our event listener for the click
    btn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    });
</script>
</body>
</html>
