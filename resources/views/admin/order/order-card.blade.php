<?php
/**@var \App\Models\Order $order */
?>
<div class="col">
    <div class="card h-100">

        <div class="card-body">
            <h5 class="card-title">({{$order->id}}){{ $order->customer->name}}</h5>
            <h6>{{$order->shipping_address}}</h6>
            <h6>{{$order->price}}</h6>

        </div>
        <div class="card-footer">
            <div class="float-start">
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


                    </ul>

                </div>
            </div>
            <div class="float-end"><a href="{{action([\App\Http\Controllers\Admin\OrderController::class,'show'],['order'=>$order->id])}}">@lang('common.show')</a></div>
        </div>
    </div>
</div>