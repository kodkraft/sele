@extends('layouts.app')

@section('content')

    <form
        action="{{action([\App\Http\Controllers\Admin\Category\CategoryImageController::class,'store'],['category'=>$category->id])}}"
        method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Save</button>
    </form>
    <div class="flex flex-col mt-8">
        <div class="flex flex-wrap">
            @foreach($category->images as $image)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                             src="{{url('images/'.$image->file_name)}}">
                    </a>
                    <div class="mt-4">
                        <button>@lang('common.delete')</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


