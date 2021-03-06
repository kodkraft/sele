<?php

use App\Http\Controllers\Admin\Category\CategoryImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FullTextSearchController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Product\ProductImageController;
use App\Http\Controllers\Admin\Product\ProductPropertyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Catalog\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

//product
Route::get('/products/{product}', [App\Http\Controllers\Catalog\ProductController::class, 'show']);


Route::middleware(['auth'])->group(function () {
    Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create']);
    Route::get('admin/categories/{category}', [CategoryController::class, 'show']);
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::patch('admin/categories/{category}', [CategoryController::class, 'update']);
    Route::post('admin/categories', [CategoryController::class, 'store']);
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('admin/categories/{category}/products', [ProductController::class, 'index'])->name('category.product.index');

    //category images
    Route::get('admin/categories/{category}/images', [CategoryImageController::class, 'index']);
    Route::post('admin/categories/{category}/images', [CategoryImageController::class, 'store']);
    Route::delete('admin/categories/{category}/images/{image}', [CategoryImageController::class, 'destroy']);

    //products
    Route::get('admin/products', [ProductController::class, 'index']);
    Route::get('admin/products/create', [ProductController::class, 'create']);
    Route::get('admin/products/{product}', [ProductController::class, 'show']);
    Route::get('admin/products/{product}/edit', [ProductController::class, 'edit']);
    Route::patch('admin/products/{product}', [ProductController::class, 'update']);
    Route::delete('admin/products/{product}', [ProductController::class, 'destroy']);
    Route::post('admin/products', [ProductController::class, 'store']);


    //product images
    Route::get('admin/products/{product}/images', [ProductImageController::class, 'index']);
    Route::post('admin/products/{product}/images', [ProductImageController::class, 'store']);
    Route::delete('admin/products/{product}/images/{image}', [ProductImageController::class, 'destroy']);

    //product propert
    Route::get('admin/products/{product}/properties', [ProductPropertyController::class, 'index']);
    Route::post('admin/products/{product}/properties', [ProductPropertyController::class, 'store']);
    Route::delete('admin/products/{product}/properties/{property}', [ProductPropertyController::class, 'destroy']);

    //settings
    Route::get('admin/settings', [SettingController::class, 'index']);
    Route::patch('admin/settings/{setting}', [SettingController::class, 'update']);

    //orders
    Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('admin/orders/{order}', [OrderController::class, 'show'])->name('admin.order.show');
    Route::get('admin/orders/{order}/edit', [OrderController::class, 'edit']);
    Route::post('admin/orders/{order}', [OrderController::class, 'destroy']);

    //search
    Route::get('admin/search', [FullTextSearchController::class, 'index']);

    //properties
    Route::get('admin/properties', [PropertyController::class, 'index']);
    Route::get('admin/properties/create', [PropertyController::class, 'create']);
    Route::post('admin/properties', [PropertyController::class, 'store']);
    Route::get('admin/properties/{property}', [PropertyController::class, 'show']);
    Route::get('admin/properties/{property}/edit', [PropertyController::class, 'edit']);
    Route::patch('admin/properties/{property}', [PropertyController::class, 'update']);
    Route::delete('admin/properties/{property}', [PropertyController::class, 'destroy']);

    //customers

    Route::get('admin/customers', [CustomerController::class, 'index']);
    Route::get('admin/customers/{customer}', [CustomerController::class, 'show']);
    Route::get('admin/customers/{customer}/edit', [CustomerController::class, 'edit']);
    Route::post('admin/customers/{customer}', [CustomerController::class, 'destroy']);
    Route::patch('admin/customers/{customer}', [CustomerController::class, 'update']);

    Route::get('admin/customers/{customer}/orders', [OrderController::class, 'index'])
        ->name('admin.customer.order.index');







});


