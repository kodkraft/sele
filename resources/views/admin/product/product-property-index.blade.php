<?php
/**@var \App\Models\Product $product */

/**@var \App\Models\Property[] $properties */

?>
@extends('layouts.app',['title'=>$product->title.' properties'])
@section('content')

    <h2>{{$product->title}} Properties</h2>
    <hr>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-6">
            <form
                    action="{{action([\App\Http\Controllers\Admin\Product\ProductPropertyController::class,'store'],['product'=>$product->id])}}"
                    method="post"
                    class="row g-3"
            >
                @csrf

                <div class="col-md-12">
                    <select class="form-control"
                            id="property_id"
                            name="property_id"
                            onchange="getPropertyValues(this.value)"
                    >
                        @foreach($properties as $prop)
                            <option value="{{$prop->id}}"
                                    @if(old('property_id')==$prop->id) selected @endif>{{$prop->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                    <input type="text"
                           class="form-control"
                           name="value"
                           placeholder="Value"
                           list="value_list"
                           value="{{old('value')}}">
                    <datalist id="value_list">
                        @foreach($properties->first()->values as $value)
                            <option value="{{$value}}">
                        @endforeach
                    </datalist>
                    @foreach($properties as $prop)
                        <datalist id="value_list_{{$prop->id}}">
                            @foreach($prop->values as $value)
                                <option value="{{$value}}">
                            @endforeach
                        </datalist>
                    @endforeach
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">@lang('common.save')</button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>@lang('common.actions')</th>
                <th>@lang('common.property')</th>
                <th>@lang('common.value')</th>

            </tr>
            </thead>
            <tbody>
            @foreach($product->properties as $prop)
                <tr>
                    <td>
                        <form action="{{action([\App\Http\Controllers\Admin\Product\ProductPropertyController::class,'destroy'],['product'=>$product->id,'property'=>$prop->id])}}"
                              method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">@lang('common.delete')</button>
                        </form>
                    </td>
                    <td>{{$prop->name}}</td>
                    <td>{{$prop->pivot->value}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function getPropertyValues(id) {
            $(`#value_list`).html('');
            $('#value_list').append($('#value_list_' + id).html());
        }
    </script>

@endsection


