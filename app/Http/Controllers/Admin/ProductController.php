<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin/product-index')
            ->with('products', $products);
    }


    public function create()
    {
        return view('admin/product-create');
    }


    public function store(SaveProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();
        Log::info($message = $product->title . ' created');
        return redirect()->back()->with('success', $message);
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }
}
