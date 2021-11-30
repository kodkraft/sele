<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sele | {{$title ?? ''}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

    @stack('css')
    <style>


    </style>
</head>
<body >

@include('layouts.partials.navbar')


<div class="container-fluid">
    <div class="row">
        @include('layouts.partials.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
            @yield('content')
        </main>
    </div>
</div>






<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
<script>


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
