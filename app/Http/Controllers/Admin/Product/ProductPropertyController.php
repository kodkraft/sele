<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductPropertyRequest;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductPropertyController extends Controller
{

    public function index(Product $product)
    {
        $properties = Property::all();
        return view('admin/product/product-property-index')
            ->with('properties', $properties)
            ->with('product', $product);
    }


    public function store(StoreProductPropertyRequest $request, Product $product)
    {
        /** @var Property $property */
        $property = Property::find($request->property_id);
        $product
            ->properties()
            ->attach($property->id, ['value' => $request->value]);
        Log::info($message = 'Property ' . $property->name . ' added to ' . $product->title);
        return redirect()->back()->with('success', $message);
    }


    public function destroy(Product $product, Property $property)
    {
        $product->properties()->detach([$property->id]);
        Log::info($message = 'Property ' . $property->name . ' removed from ' . $product->title);
        return redirect()->back()->with('success', $message);
    }
}
