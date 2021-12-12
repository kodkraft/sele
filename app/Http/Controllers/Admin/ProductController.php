<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('admin/product-index')
            ->with('products', $products);
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin/product-create')
            ->with('categories', $categories);
    }


    public function store(SaveProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();
        Log::info($message = $product->title . ' created');
        return redirect()->back()->with('success', $message);
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin/product-edit')
            ->with('product', $product)
            ->with('categories', $categories);
    }


    public function show(Product $product)
    {
        //
    }


    public function update(SaveProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();
        Log::info($message = $product->title . ' updated');
        return redirect()->back()->with('success', $message);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        Log::info($message = $product->title . ' deleted');
        return redirect()->back()->with('success', $message);
    }
}
