@extends('layouts.app')

@section('content')

    <div class="flex flex-col mt-8">
        <div class="flex flex-wrap">
            @foreach($category->images as $image)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                             src="{{url($image->file_name)}}">
                    </a>
                    <div class="mt-4">
                        <button>Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


