<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryImageController extends Controller
{
    public function index(Category $category)
    {
        return view('admin/category/category_image_index')
            ->with('category', $category);
    }

    public function store(Category $category, Request $request)
    {
        $fileName = $category->id . '_' . Str::random() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = 'categories';
        $request->file('image')->storeAs($path, $fileName, 'images');
        $category->images()->create(['file_name' => $path .'/'.$fileName]);
        return redirect()->back()->with('success', 'image created');
    }

    public function destroy(Category $category, Image $image)
    {
    }
}
