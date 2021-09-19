<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin/category-index')
            ->with('categories', $categories);
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin/category-create')
            ->with('categories', $categories);
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->fill($request->toArray())->save();
        $message = $category->title . ' created';
        Log::info($message);

        return redirect()->back()->with('success', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
