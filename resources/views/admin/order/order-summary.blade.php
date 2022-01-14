<?php
/**@var \App\Models\Order[]|\Illuminate\Support\Collection $orders */
?>
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
