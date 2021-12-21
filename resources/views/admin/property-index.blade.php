<?php
/**@var \App\Models\Property[] $properties */

?>
@extends('layouts.app',['title'=>'Properties'])
@section('content')
    <h2>@lang('common.properties')</h2>
    <div class="">
        <a href="{{action([\App\Http\Controllers\Admin\PropertyController::class,'create'])}}" class="btn btn-primary">@lang('common.create')</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Actions</th>
                <th>@lang('common.id')</th>
                <th>@lang('common.name')</th>
                <th>@lang('common.category')</th>
                <th>@lang('common.options')</th>

            </tr>
            </thead>
            <tbody>

            @foreach($properties as $property)
                <tr>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li>
                                    <a class="dropdown-item"
                                       href="{{action([\App\Http\Controllers\Admin\PropertyController::class,'edit'],['property'=>$property->id])}}">@lang('common.edit')</a>
                                </li>
                                <li>

                                    <form action="{{action([\App\Http\Controllers\Admin\PropertyController::class,'destroy'],['property'=>$property->id])}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item swal-submit"
                                                data-text="@lang('common.delete_confirm')"
                                                data-title="@lang('common.are_you_sure')"
                                                type="submit">@lang('common.delete')</button>
                                    </form>

                                </li>

                            </ul>

                        </div>
                    </td>
                    <td>{{$property->id}}</td>
                    <td>{{$property->name}}</td>
                    <td>{{$property->category?->name}}</td>
                    <td>{{$property->values->implode(',')}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


