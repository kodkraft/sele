<?php
/**@var \App\Models\Customer[] $customers */

?>
@extends('layouts.app',['title'=>'Customers'])
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Actions</th>
                <th>@lang('common.id')</th>
                <th>@lang('common.customer')</th>
                <th>@lang('common.email')</th>
                <th>@lang('common.phone')</th>
                <th>@lang('common.total_orders')</th>

            </tr>
            </thead>
            <tbody>

            @foreach($customers as $customer)
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
                                       href="{{action([\App\Http\Controllers\Admin\CustomerController::class,'show'],['customer'=>$customer->id])}}">@lang('common.show')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="{{action([\App\Http\Controllers\Admin\CustomerController::class,'edit'],['customer'=>$customer->id])}}">@lang('common.edit')</a>
                                </li>
                                <li>

                                    <form action="{{action([\App\Http\Controllers\Admin\CustomerController::class,'destroy'],['customer'=>$customer->id])}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item swal-submit"
                                                type="submit">@lang('common.delete')</button>
                                    </form>

                                </li>

                            </ul>

                        </div>
                    </td>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->user->name}}</td>
                    <td>{{$customer->user->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td><a href="{{route('admin.customer.order.index',['customer'=>$customer->id])}}">{{$customer->orders->count()}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

