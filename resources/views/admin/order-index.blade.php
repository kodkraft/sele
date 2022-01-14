<?php
/**@var \App\Models\Order[] $orders */

?>
@extends('layouts.app',['title'=>'Orders'])
@section('content')
    <h2>@lang('common.orders')</h2>
    <hr>
    <!-- show brief info about orders -->
    <!--total orders-->
    <div class="row">
        <div class="col-md-2 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h3>@lang('common.total_orders')</h3>
                </div>
                <div class="card-body">
                    <h1>{{$orders->count()}}</h1>
                </div>
            </div>
        </div>
        <!--total orders-->
        <!--total orders sum-->
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>@lang('common.total_orders_value')</h3>
                </div>
                <div class="card-body">
                    <h1>{{$orders->sum('price')}}</h1>
                </div>
            </div>
        </div>
        <!--total orders sum-->
        <!-- sum for each status -->
        @foreach(\App\Models\OrderStatus::all()->sortBy('id') as $orderStatus)
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$orderStatus->name}}</h3>
                    </div>
                    <div class="card-body">
                        <h1>{{$orders->where('order_status_id',$orderStatus->id)->sum('price')}}</h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

        <!--total orders-->

    <h2 class="mt-4">@lang('common.last_orders',['order_count'=>$orders->count()])</h2>
    <hr>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Actions</th>
                <th>@lang('common.order_id')</th>
                <th>@lang('common.customer')</th>
                <th>@lang('common.status')</th>
                <th>@lang('common.products')</th>
                <th>@lang('common.order_total')</th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)
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
                                       href="{{action([\App\Http\Controllers\Admin\OrderController::class,'show'],['order'=>$order->id])}}">@lang('common.show')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="{{action([\App\Http\Controllers\Admin\OrderController::class,'edit'],['order'=>$order->id])}}">@lang('common.edit')</a>
                                </li>
                                <li>

                                    <form action="{{action([\App\Http\Controllers\Admin\OrderController::class,'destroy'],['order'=>$order->id])}}"
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
                    <td>{{$order->id}}</td>
                    <td>{{$order->customer->user->name}}</td>
                    <td>{{$order->orderStatus->name}}</td>
                    <td>{!! $order->products->groupBy('id')->map(function ($group){
                            return $group->sum('pivot.amount').' adet '.'<a href="'.action([\App\Http\Controllers\Admin\ProductController::class,'show'],['product'=>$group->first()->id]).'">'.$group->first()->title.'</a>';
                        })->join(', ')!!}
                    </td>
                    <td>{{$order->order_total}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

