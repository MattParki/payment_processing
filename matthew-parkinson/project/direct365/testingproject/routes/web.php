<?php

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


Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');

//routing for creating and storing the products
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');




Route::post('/products/creatingtheproduct', [App\Http\Controllers\ProductPriceController::class, 'storeProduct'])->name('products.storeProduct');
Route::get('/products/createtheproduct', [App\Http\Controllers\ProductPriceController::class, 'createProduct']);
Route::get('/products/createtheproduct/display', [App\Http\Controllers\ProductPriceController::class, 'display']);
Route::get('/products/createtheproduct/{id}', [App\Http\Controllers\ProductPriceController::class, 'show']);
Route::get('/products/createtheproduct/display/product_edit/{id}', [App\Http\Controllers\ProductPriceController::class, 'showProductToEdit']);
Route::post('/products/createtheproduct/display/product_edit/{id}', [App\Http\Controllers\ProductPriceController::class, 'editProduct'])->name('products.editProduct');

//Route::post('/products/adm/pricecreate/{id}', [ProductController::class, 'showPrice'])->name('products.showPrice')->middleware('auth');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::delete('/products/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('products.delete');
