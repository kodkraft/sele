<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index(Product $product)
    {
        $properties = Property::all();
        return view('admin/product/property-index')
            ->with('properties', $properties)
            ->with('product', $product);
    }


    public function create(Product $product)
    {
        //
    }


    public function store(Request $request, Product $product)
    {
        //
    }

    public function show(Product $product, Property $property)
    {
        //
    }


    public function edit(Product $product, Property $property)
    {
        //
    }


    public function update(Request $request, Product $product, Property $property)
    {
        //
    }

    public function destroy(Product $product, Property $property)
    {
        //
    }
}
