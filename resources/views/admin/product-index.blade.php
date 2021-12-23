<?php
/**@var \App\Models\Product[] $products */

?>
@extends('layouts.app',['title'=>'Products'])
@section('content')

    <h2>Products <a class="btn btn-success"
                    href="{{action([\App\Http\Controllers\Admin\ProductController::class,'create'])}}">
            @lang('common.create')
        </a></h2>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4">
        @foreach($products as $product)
            @include('admin/product/product-card',['product'=>$product])
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

