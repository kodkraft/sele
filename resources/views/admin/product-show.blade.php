<?php
/**@var \App\Models\Product $product */

/**@var \App\Models\OrderStatus[] $orderStatuses */
?>
@extends('layouts.app', ['title' => $product->name.' Details'])

@push('css')

@endpush
@section('content')
    <div class="row">
        <h3>@lang('common.product_details')</h3>
        <!-- product details -->
        <div class="col-md-12 col-lg-6">
            <form class="row g-3" action="" method="post">
                <div class="col-md-6">
                    <label for="title" class="form-label">@lang('common.title')</label>
                    <input type="text"
                           id="title"
                           disabled
                           name="title"
                           class="form-control"
                           value="{{$product->title}}">

                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">@lang('common.price')</label>
                    <input type="number"
                           class="form-control "
                           id="price"
                           disabled
                           name="price"
                           value="{{$product->price}}">

                </div>
                <div class="col-12">
                    <label for="description" class="form-label">@lang('common.description')</label>
                    <textarea type="text"
                              class="form-control"
                              disabled
                              id="description"
                              name="description">{{$product->description}}</textarea>

                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">@lang('common.category')</label>
                    <input type="text"
                           class="form-control "
                           disabled
                           id="category_id"
                           name="category_id"
                           value="{{$product->category->title}}">
                </div>
            </form>
        </div>
        <hr class="mt-4">
        <h4>@lang('common.images')</h4>
        @foreach($product->images as $image)
            <div class="card-group col-md-6 col-lg-3 mt-3">

                <div class="card">
                    <img src="{{$image->url}}" class="card-img-top" alt="...">
                </div>
            </div>
        @endforeach

    </div>
    <hr>
    <div class="row mt-4">
        <h3>@lang('common.totals')</h3>
        <table class="table table-striped">
            <thead>

            <tr>
                @foreach($orderStatuses as $orderStatus)
                    <th>{{$orderStatus->name}}:
                        {{$product->orders->where('order_status_id',$orderStatus->id)->sum('pivot.price')}}</th>
                @endforeach

            </tr>
            </thead>

        </table>

    </div>
    <div class="row mt-4">
        <!--product orders-->
        <h3>@lang('common.orders')</h3>
        <div class="col-md-12 col-lg-6 table-responsive">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@lang('common.id')</th>
                    <th>@lang('common.customer')</th>
                    <th>@lang('common.status')</th>
                    <th>@lang('common.price')</th>
                    <th>@lang('common.amount')</th>
                    <th>@lang('common.created_at')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product->orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$order->orderStatus->name}}</td>
                        <td>{{$order->pivot->price}}</td>
                        <td>{{$order->pivot->amount}}</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js')

@endpush
