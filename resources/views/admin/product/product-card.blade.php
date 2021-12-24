<?php
/**@var \App\Models\Product $product */
?>
<div class="col">
    <div class="card h-100">
        <img src="{{$product->image()?->url}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">({{$product->id}}){{ $product->title }}</h5>
            <p class="card-text">{{$product->short_description}}</p>
        </div>
        <div class="card-footer">
            <div class="float-start">
                <div class="dropdown">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><h6 class="dropdown-header">@lang('common.product')</h6></li>
                        <li>
                            <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\ProductController::class,'show'],['product'=>$product->id])}}">@lang('common.details')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\Product\ProductImageController::class,'index'],['product'=>$product->id])}}">@lang('common.images')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\ProductController::class,'edit'],['product'=>$product->id])}}">@lang('common.edit')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\Product\ProductPropertyController::class,'index'],['product'=>$product->id])}}">@lang('common.properties')</a>
                        </li>
                        <li>

                            <form action="{{action([\App\Http\Controllers\Admin\ProductController::class,'destroy'],['product'=>$product->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item swal-submit" type="submit">@lang('common.delete')</button>
                            </form>

                        </li>

                    </ul>

                </div>

            </div>
            <div class="float-end">{{$product->price}} ₺</div>
        </div>
    </div>
</div>