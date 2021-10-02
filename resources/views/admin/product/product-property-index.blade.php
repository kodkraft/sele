<?php
/**@var \App\Models\Product $product */
/**@var \App\Models\Property[] $properties */

?>
@extends('layouts.app',['title'=>$product->title.' properties'])
@section('content')
    <form
            action="{{action([\App\Http\Controllers\Admin\Product\ProductPropertyController::class,'store'],['product'=>$product->id])}}"
            method="post">
        @csrf
        <select class="ml-2">
            @foreach($properties as $prop)
            <option value="{{$prop->id}}">{{$prop->name}}</option>
            @endforeach
        </select>
        <input type="text" name="value">
        <button type="submit">Save</button>
    </form>
    <div class="flex flex-col mt-8">
        <div class="flex flex-wrap">
            @foreach($product->properties as $property)

                    {{$property->name}}=> {{$property->pivot->value}}
                    <div class="mt-4">
                        <form action="{{action([\App\Http\Controllers\Admin\Product\ProductPropertyController::class,'destroy'],['product'=>$product->id,'property'=>$property->id])}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <button>@lang('common.delete')</button>
                        </form>
                    </div>

            @endforeach
        </div>
    </div>
@endsection


