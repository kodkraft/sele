<?php
/**@var \App\Models\Order $order */

?>
@extends('layouts.app', ['title' => 'Order #' . $order->id])

@push('css')

@endpush
@section('content')
    <div class="row">
        <!-- Order Details -->
        <div class="col-md-12 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$order->id}} Order Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order ID</label>
                                <input type="text" class="form-control" value="{{ $order->id }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order Date</label>
                                <input type="text" class="form-control"
                                       value="{{ $order->created_at->format('d.m.Y') }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control" value="{{ $order->customer->name }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer Email</label>
                                <input type="text" class="form-control" value="{{ $order->customer->user->email }}"
                                       disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Customer Phone</label>
                                <input type="text" class="form-control" value="{{ $order->customer->phone }}" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Billing Address</label>
                                <textarea class="form-control" readonly
                                          rows="7">{{ $order->billing_address }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shipping Address</label>
                                <textarea class="form-control" readonly
                                          rows="7">{{ $order->shipping_address }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">


                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->pivot->amount }}</td>
                                    <td>{{ $product->pivot->price }}</td>
                                    <td class="text-end">{{ $product->pivot->price * $product->pivot->amount }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th class="text-end">{{ $order->price }}</th>
                            </tr>
                            </tfoot>


                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('js')

@endpush
