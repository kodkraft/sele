<?php
/**@var $customer \App\Models\Customer*/
?>
@extends('layouts.app',['title'=>'Customers'])
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Customer</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" value="{{$customer->name}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" value="{{$customer->user->email}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" value="{{$customer->phone}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" value="{{$customer->addresses->implode('address')}}" disabled>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--- end card -->
                <!--- start orders card -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Orders</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
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

                                        @foreach($customer->orders as $order)
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
                            </div>
                        </div>
                    </div>
                    <!-- show total earned from this customer -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('common.total_earned')</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            @lang('common.total_earned')
                                        </th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{$customer->orders->sum('price')}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

            </div>
        </div>
    </div>


@endsection

