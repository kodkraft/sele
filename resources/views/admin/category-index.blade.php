<?php
/**@var \App\Models\Category[]|\Illuminate\Support\Collection $categories*/
    ?>
@extends('layouts.app',['title'=>'Categories'])

@push('css')

@endpush

@section('content')

    <h2>@lang('common.category') <a class="btn btn-success" href="{{action([\App\Http\Controllers\Admin\CategoryController::class,'create'])}}">
            @lang('common.create')
        </a></h2>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-6 g-4">

        @foreach($categories as $category)
            @include('admin/category/category-card',['category'=>$category])
        @endforeach

    </div>
    <div class="row row-cols-1  pt-4 float-end">
        <div class="">
            {{$categories->links()}}
        </div>
    </div>
@endsection

@push('js')

@endpush
