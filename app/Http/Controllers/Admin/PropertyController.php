<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePropertyRequest;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = Property::with('products')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('admin/property-index')
            ->with('properties', $properties);
    }


    public function create()
    {
        $categories = Category::with('ancestors')->get();
        return view('admin/property-create')
            ->with('categories', $categories);
    }


    public function store(SavePropertyRequest $request)
    {
        $property = new Property();
        $property->name = $request->name;
        $property->description = $request->description;
        $property->category_id = $request->category_id;
        $property->values = preg_split('/\r\n|\r|\n/', $request->values);
        $property->save();
        return redirect()->back()->with('success', 'Property created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Property $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }



    public function edit(Property $property)
    {
        $categories = Category::with('ancestors')->get();
        return view('admin/property-edit')
            ->with('property', $property)
            ->with('categories', $categories);
    }


    public function update(SavePropertyRequest $request, Property $property)
    {
        $property->name = $request->name;
        $property->description = $request->description;
        $property->category_id = $request->category_id;
        $property->values = preg_split('/\r\n|\r|\n/', $request->values);
        $property->save();
        return redirect()->back()->with('success', 'Property updated successfully');
    }


    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->back()->with('success', 'Property deleted successfully');
    }
}
