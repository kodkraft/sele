<?php
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
                                   class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
