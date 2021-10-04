<?php
/**@var \App\Models\Order[] $orders */

?>
@extends('layouts.app',['title'=>'Orders'])
@section('content')

    <table>
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
                    dropdown menu
                    delete
                    show
                    print
                </td>
                <td>{{$order->id}}</td>
                <td>{{$order->customer->user->name}}</td>
                <td>{{$order->orderStatus->name}}</td>
                <td>{{$order->products->count()}}</td>
                <td>{{$order->order_total}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

