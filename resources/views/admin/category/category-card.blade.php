<?php
/**@var \App\Models\Category $category*/
?>

<div class="col">
    <div class="card h-100">
        <img src="{{$category->image()?->url}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">({{$category->id}}){{ $category->title }}</h5>
            <p class="card-text"><a href="{{route('category.product.index',['category'=>$category->id])}}">@lang('common.products'): {{$category->allProducts()->count()}}</a></p>
        </div>
        <div class="card-footer">
            <div class="float-start">
                <div class="dropdown">
                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><h6 class="dropdown-header">@lang('common.category')</h6></li>
                        <li>
                            <a class="dropdown-item" href="{{route('category.product.index',['category'=>$category->id])}}">@lang('common.products')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\Category\CategoryImageController::class,'index'],['category'=>$category->id])}}">@lang('common.images')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{action([\App\Http\Controllers\Admin\CategoryController::class,'edit'],['category'=>$category->id])}}">@lang('common.edit')</a>
                        </li>
                        <li>

                            <form action="{{action([\App\Http\Controllers\Admin\CategoryController::class,'destroy'],['category'=>$category->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item swal-submit" type="submit">@lang('common.delete')</button>
                            </form>

                        </li>

                    </ul>

                </div>

            </div>
            <div class="float-end">{{$category->title_with_path}}</div>
        </div>
    </div>
</div>
