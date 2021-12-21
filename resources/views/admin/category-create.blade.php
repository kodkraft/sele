<?php
/**@var \App\Models\Category[]|\Kalnoy\Nestedset\Collection $categories */

?>
@extends('layouts.app')
@section('content')
    <!-- create category form -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Create Category</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ action([\App\Http\Controllers\Admin\CategoryController::class,'store']) }}"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">@lang('common.title')</label>
                                <input type="text"
                                       name="title"
                                       id="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('name') }}">
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="parent_id">@lang('common.parent')</label>
                                <select name="parent_id"
                                        id="parent_id"
                                        class="form-control @error('parent_id') is-invalid @enderror">
                                    <option value="">@lang('common.none')</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                {{ old('parent_id') == $category->id ? 'selected' : '' }}>{{ $category->title_with_path }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">@lang('common.create')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    @livewireScripts
@endpush
