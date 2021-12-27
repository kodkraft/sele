<?php
/**@var \App\Models\Product[] $products */
/**@var \App\Models\Category[] $categories */
/**@var \App\Models\Customer[] $customers */

?>
@extends('layouts.app',['title'=>'Search Results'])
@section('content')

    <h2>Search Results</h2>
    <h3>@lang('common.products') ({{$products->count()}})</h3>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4">
        @foreach($products as $product)
            @include('admin/product/product-card',['product'=>$product])
        @endforeach
    </div>
    <hr>
    <h3>@lang('common.categories') ({{$categories->count()}})</h3>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4">
        @foreach($categories as $category)
            @include('admin/category/category-card',['category'=>$category])
        @endforeach
    </div>
    <hr>
    <h3>@lang('common.customers') ({{$customers->count()}})</h3>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4">
        @foreach($customers as $customer)
            @include('admin/customer/customer-card',['customer'=>$customer])
        @endforeach
    </div>

@endsection

@push('js')
    @livewireScripts
@endpush

