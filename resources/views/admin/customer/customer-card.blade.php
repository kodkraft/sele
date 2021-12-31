<?php
/**@var \App\Models\Customer $customer */
?>
<div class="col">
    <div class="card h-100">

        <div class="card-body">
            <h5 class="card-title">({{$customer->id}}){{ $customer->name}}</h5>
            <h6>{{$customer->phone}}</h6>
            <h6>{{$customer->user->email}}</h6>

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
            </div>
            <div class="float-end"><a href="{{route('admin.customer.order.index',['customer'=>$customer->id])}}">@lang('common.orders'): {{$customer->orders->count()}}</a></div>
        </div>
    </div>
</div>