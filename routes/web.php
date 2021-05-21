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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('categories/all', [\App\Http\Controllers\CategorieController::class, 'all'])->name('categories.all');
Route::get('categories/new', [\App\Http\Controllers\CategorieController::class, 'addView'])->name('categories.new');
Route::post('categories/add', [\App\Http\Controllers\CategorieController::class, 'add'])->name('categories.add');
Route::get('categories/edit/{id}', [\App\Http\Controllers\CategorieController::class, 'edit'])->name('categories.edit');
Route::post('categories/save', [\App\Http\Controllers\CategorieController::class, 'save'])->name('categories.save');
Route::get('categories/delete/{id}', [\App\Http\Controllers\CategorieController::class, 'delete'])->name('categories.delete');

Route::get('products/all', [\App\Http\Controllers\ProductController::class, 'all'])->name('products.all');
//Route::get('products/{id}', [\App\Http\Controllers\ProductController::class, 'one']);
Route::get('products/new', [\App\Http\Controllers\ProductController::class, 'addView'])->name('products.new');
Route::post('products/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('products.add');
Route::get('products/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::post('products/save', [\App\Http\Controllers\ProductController::class, 'save'])->name('products.save');
Route::get('products/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('products.delete');

Route::get('orders/all', [\App\Http\Controllers\OrderController::class, 'all'])->name('orders.all');

require __DIR__.'/auth.php';
