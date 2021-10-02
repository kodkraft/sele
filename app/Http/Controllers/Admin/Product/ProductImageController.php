<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\FileSystem;

class ProductImageController extends Controller
{
    public function index(Product $product)
    {
        return view('admin/product/product-image-index')
            ->with('product', $product);
    }

    public function store(Product $product, Request $request)
    {
        $fileName = $product->id . '_' . Str::random() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = 'products';
        $request->file('image')->storeAs($path, $fileName, 'images');
        $product->images()->create(['file_name' => $path . '/' . $fileName]);
        return redirect()->back()->with('success', 'image created');
    }

    public function destroy(Product $product, Image $image)
    {
        Storage::disk('images')->delete($image->file_name);
        $image->delete();
        return redirect()->back()->with('success', 'image deleted');
    }
}
