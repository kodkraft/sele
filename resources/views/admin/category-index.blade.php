@extends('layouts.app')
@section('content')
    <h1>Categories</h1>
    <div class="flex justify-center bg-gray-100 py-10 p-14">
        <!---== First Stats Container ====--->
        <div class="grid grid-cols-4 ">

            @foreach($categories as $category)
                @livewire('show-category', ['category' => $category])
            @endforeach

        </div>
    </div>
@endsection
