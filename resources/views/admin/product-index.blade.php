<?php
/**@var \App\Models\Product[] $products */

?>
@extends('layouts.app')
@section('content')
    <div class="flex flex-row justify-end mt-8 container px-4">
        <a href="{{action([\App\Http\Controllers\Admin\ProductController::class,'create'])}}">
            @lang('common.create')
        </a>
    </div>
    <div class="flex flex-col mt-8">
        <div class="flex flex-wrap">
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
        </div>
    </div>
@endsection

@push('js')
    @livewireScripts
@endpush

