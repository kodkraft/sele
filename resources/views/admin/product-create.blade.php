<?php
/**@var \App\Models\Category[]|\Kalnoy\Nestedset\Collection $categories */

?>
@extends('layouts.app')
@section('content')
    <div class="flex flex-col">

        <div class="flex flex-row justify-end mt-8 container px-4">
            <a href="{{action([\App\Http\Controllers\Admin\ProductController::class,'index'])}}"
               class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                @lang('common.show-products')
            </a>
        </div>

        <form action="{{action([\App\Http\Controllers\Admin\ProductController::class,'store'])}}"
              method="post">
            @csrf
            <section class="text-gray-600">
                <div class="container mx-auto px-5 py-4">
                    <div class="w-full md:w-1/2 bg-white flex flex-col md:py-8 mt-8 md:mt-0">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">@lang('common.create_new_product')</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">@lang('common.please-fill-following-fields')</p>
                        <div class="relative mb-4">
                            <label for="title" class="leading-7 text-sm text-gray-600">@lang('common.title')</label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   value="{{old('title')}}"
                                   class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>

                        <div class="relative mb-4">
                            <label for="price" class="leading-7 text-sm text-gray-600">@lang('common.price')</label>
                            <input type="number"
                                   id="price"
                                   name="price"
                                   value="{{old('price')}}"
                                   class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>

                        <div class="relative mb-4">
                            <label for="description" class="leading-7 text-sm text-gray-600">@lang('common.description')</label>
                            <textarea
                                   id="description"
                                   name="description"
                                   class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{old('description')}}</textarea>
                        </div>

                        <div class="relative mb-4">
                            <label for="parent"
                                   class="leading-7 text-sm text-gray-600">@lang('common.category')</label>
                            <select id="category_id"
                                    name="category_id"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out select2">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('category_id')==$category->id) selected @endif>{{ $category->title_with_path }}</option>
                                @endforeach
                            </select>
                        </div>



                        <button
                                class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            @lang('common.save')
                        </button>
                    </div>

                </div>
            </section>
        </form>
    </div>

@endsection

@push('js')
    @livewireScripts
@endpush