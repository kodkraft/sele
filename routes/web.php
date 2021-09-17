<?php

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

Route::middleware(['auth'])->group(function () {
    Route::get('admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
    Route::post('admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::delete('admin/categories/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
