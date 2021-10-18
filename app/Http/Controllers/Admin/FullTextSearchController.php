<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FullTextSearchController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search($request->search)->paginate(10);

        return $products;
    }
}
