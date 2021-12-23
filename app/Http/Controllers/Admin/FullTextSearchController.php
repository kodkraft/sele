<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FullTextSearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $products = Product::search($request->search)
            ->paginate(100);

        $categories = Category::search($request->search)
            ->paginate(100);


        return view('admin/search-index')
            ->with('products', $products)
            ->with('categories', $categories);
    }
}
