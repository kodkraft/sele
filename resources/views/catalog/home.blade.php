<?php
/**@var \App\Models\Product[] $products */

?>
@extends('layouts.catalog.app')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            @foreach($products as $product)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                         preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                    <div class="card-body">
                        <p class="card-text">{{$product->short_description}}</p>

                    </div>
                    <div class="card-footer">
                        <a href="" class="btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection