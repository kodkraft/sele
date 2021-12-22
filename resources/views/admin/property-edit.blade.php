<?php
/**@var \App\Models\Category[]|\Kalnoy\Nestedset\Collection $categories */

/**@var \App\Models\Property $property */
?>
@extends('layouts.app',['title'=>'Update Property '.$property->name])
@section('content')




    <h2>@lang('common.update-property') {{$property->name}}</h2>
    <a href="{{action([\App\Http\Controllers\Admin\PropertyController::class,'index'])}}"
       class="btn btn-success btn-sm">
        @lang('common.show-properties')
    </a>
    <hr>

    <div class="col-md-12 col-lg-6">
        <form class="row g-3" action="{{action([\App\Http\Controllers\Admin\PropertyController::class,'update'],$property->id)}}"
              method="post">
            @csrf
            @method('PATCH')
            <div class="col-md-12">
                <label for="name" class="form-label">@lang('common.name')</label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{$property->name}}">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-12">
                <label for="description" class="form-label">@lang('common.description')</label>
                <textarea type="text"
                          class="form-control @error('description') is-invalid @enderror"
                          id="description"
                          name="description">{{$property->description}}</textarea>
                @error('description')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="values" class="form-label">@lang('common.values')</label>
                <textarea type="text"
                          rows="5"
                          class="form-control @error('values') is-invalid @enderror"
                          id="values"
                          name="values">{{$property->values->implode("\r\n")}}</textarea>

                <small class="form-text text-muted">
                    @lang('common.each-line-for-one-value')
                </small>
                @error('values')
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
                                @if($property->category_id==$category->id) selected @endif>{{ $category->title_with_path }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">@lang('common.update')</button>
            </div>
        </form>
    </div>



@endsection

@push('js')
    @livewireScripts
@endpush
