<?php
/**@var \App\Models\Product[] $products */

?>
@extends('layouts.app',['title'=>'Products'])
@section('content')

    <h2>Products <a class="btn btn-success" href="{{action([\App\Http\Controllers\Admin\ProductController::class,'create'])}}">
            @lang('common.create')
        </a></h2>
    <hr>




    @foreach($products as $product)
        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
            <a class="block relative h-48 rounded overflow-hidden">
                <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                     src="{{$product->image()?->url}}">
            </a>
            <div class="mt-4">
                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->title }}</h2>
                <a href="{{action([\App\Http\Controllers\Admin\Product\ProductImageController::class,'index'],['product'=>$product->id])}}">@lang('common.images')</a>
            </div>
        </div>
    @endforeach


@endsection

@push('js')
    @livewireScripts
@endpush

