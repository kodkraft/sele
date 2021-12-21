<?php
/**@var \App\Models\Product[] $products */

?>
@extends('layouts.app',['title'=>'Products'])
@section('content')

    <h2>Products <a class="btn btn-success" href="{{action([\App\Http\Controllers\Admin\ProductController::class,'create'])}}">
            @lang('common.create')
        </a></h2>
    <hr>



    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4">

        @foreach($products as $product)
        <div class="col">
            <div class="card h-100">
                <img src="{{$product->image()?->url}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">({{$product->id}}){{ $product->title }}</h5>
                    <p class="card-text">{{$product->short_description}}</p>
                </div>
                <div class="card-footer">
                    <div class="float-start">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><h6 class="dropdown-header">@lang('common.product')</h6></li>
                                <li>
                                    <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\ProductController::class,'show'],['product'=>$product->id])}}">@lang('common.details')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\Product\ProductImageController::class,'index'],['product'=>$product->id])}}">@lang('common.images')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\ProductController::class,'edit'],['product'=>$product->id])}}">@lang('common.edit')</a>
                                </li>
                                <li>

                                    <form action="{{action([\App\Http\Controllers\Admin\ProductController::class,'destroy'],['product'=>$product->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item swal-submit" type="submit">@lang('common.delete')</button>
                                    </form>

                                </li>

                            </ul>

                        </div>

                    </div>
                    <div class="float-end">{{$product->price}} ₺</div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="row row-cols-1  pt-4 float-end">
        <div class="">
            {{$products->links()}}
        </div>
    </div>





@endsection

@push('js')
    @livewireScripts
@endpush

