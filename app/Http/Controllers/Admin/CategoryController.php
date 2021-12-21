<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Http\Requests\SaveCetegoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('products')
            ->with('descendants.products')
            ->paginate(50);
        return view('admin/category-index')
            ->with('categories', $categories);
    }


    public function create()
    {
        $categories = Category::with('ancestors')
            ->get()
            ->sortBy('title_with_path');
        return view('admin/category-create')
            ->with('categories', $categories);
    }


    public function store(SaveCetegoryRequest $request)
    {
        $category = new Category();
        $category->fill($request->toArray())->save();
        Log::info($message = $category->title . ' created');
        return redirect()->back()->with('success', $message);
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        $categories = Category::with('ancestors')->get();
        return view('admin/category-edit')
            ->with('categories', $categories)
            ->with('category', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill($request->toArray())->save();
        Log::info($message = $category->title . ' updated');
        return redirect()->back()->with('success', $message);
    }

    public function destroy(Category $category)
    {
        Log::info($message = $category->title . ' deleted');
        $category->delete();
        return redirect()->back()->with('success', $message);
    }
}
