<?php
/**@var \App\Models\Product $product */

?>
@extends('layouts.app',['title'=>$product->title.' images'])
@section('content')
    <form
            action="{{action([\App\Http\Controllers\Admin\Product\ProductImageController::class,'store'],['product'=>$product->id])}}"
            method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Save</button>
    </form>
    <div class="flex flex-col mt-8">
        <div class="flex flex-wrap">
            @foreach($product->images as $image)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                             src="{{url('images/'.$image->file_name)}}">
                    </a>
                    <div class="mt-4">
                        <form action="{{action([\App\Http\Controllers\Admin\Product\ProductImageController::class,'destroy'],['product'=>$product->id,'image'=>$image->id])}}"
                        method="post">
                            @csrf
                            @method('delete')
                            <button>@lang('common.delete')</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


