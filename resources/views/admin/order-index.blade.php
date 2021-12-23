<?php
/**@var \App\Models\Order[] $orders */

?>
@extends('layouts.app',['title'=>'Orders'])
@section('content')
    <div class="table-responsive">
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

