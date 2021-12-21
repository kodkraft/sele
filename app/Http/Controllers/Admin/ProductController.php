<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function index(Category $category = null)
    {
        //show all products if no category is selected
        //show all category and its descendants products if category is selected
        if ($category) {
            $categories = $category->descendants()->pluck('id');
            $categories[] = $category->getKey();
            $products = Product::with('category.ancestors')
                ->with('images')
                ->whereIn('category_id', $categories)
                ->paginate(100);
        } else {
            $products = Product::with('category.ancestors')
                ->with('images')
                ->paginate(100);
        }

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
        $orderStatuses = OrderStatus::all();
        return view('admin/product-show')
            ->with('orderStatuses', $orderStatuses)
            ->with('product', $product);
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
