<?php
/**@var \App\Models\Category[]|\Kalnoy\Nestedset\Collection $categories */

?>
@extends('layouts.app')
@section('content')



    <a href="{{action([\App\Http\Controllers\Admin\ProductController::class,'index'])}}"
       class="btn btn-info">
        @lang('common.show-products')
    </a>


    <div class="col-md-12 col-lg-6">
        <form class="row g-3" action="{{action([\App\Http\Controllers\Admin\ProductController::class,'store'])}}"
              method="post">
            @csrf
            <div class="col-md-6">
                <label for="title" class="form-label">@lang('common.title')</label>
                <input type="text"
                       id="title"
                       name="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{old('title')}}">
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">@lang('common.price')</label>
                <input type="number"
                       class="form-control @error('price') is-invalid @enderror"
                       id="price"
                       name="price"
                       value="{{old('price')}}">
                @error('price')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="description" class="form-label">@lang('common.description')</label>
                <textarea type="text"
                          class="form-control @error('description') is-invalid @enderror"
                          id="description"
                          name="description"></textarea>
                @error('description')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">@lang('common.category')</label>
                <select id="category_id"
                        name="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if(old('category_id')==$category->id) selected @endif>{{ $category->title_with_path }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">@lang('common.save')</button>
            </div>
        </form>
    </div>



@endsection

@push('js')
    @livewireScripts
@endpush
