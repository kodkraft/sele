<?php

use App\Http\Controllers\Admin\Category\CategoryImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Product\ProductImageController;
use App\Http\Controllers\Admin\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categories','App\Http\Controllers\Customer\CategoryController@index')->name('customer-category.index');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create']);
    Route::get('admin/categories/{category}', [CategoryController::class, 'show']);
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::patch('admin/categories/{category}', [CategoryController::class, 'update']);
    Route::post('admin/categories', [CategoryController::class, 'store']);
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('category.delete');

    //category images
    Route::get('admin/categories/{category}/images', [CategoryImageController::class, 'index']);
    Route::post('admin/categories/{category}/images', [CategoryImageController::class, 'store']);
    Route::delete('admin/categories/{category}/images/{image}', [CategoryImageController::class, 'destroy']);

    //products
    Route::get('admin/products', [ProductController::class, 'index']);
    Route::get('admin/products/create ', [ProductController::class, 'create']);

    //product images
    Route::get('admin/products/{product}/images', [ProductImageController::class, 'index']);
    Route::post('admin/products/{product}/images', [ProductImageController::class, 'store']);
    Route::delete('admin/products/{product}/images/{image}', [ProductImageController::class, 'destroy']);



});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
