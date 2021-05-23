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
//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


Route::middleware(['web'])->group(function () {
    Route::get('/', [\App\Http\Controllers\ProductController::class, 'all']);

    Route::get('categories/all', [\App\Http\Controllers\CategorieController::class, 'all'])->name('categories.all');
    Route::get('categories/new', [\App\Http\Controllers\CategorieController::class, 'addView'])->name('categories.new');
    Route::post('categories/add', [\App\Http\Controllers\CategorieController::class, 'add'])->name('categories.add');
    Route::get('categories/edit/{id}', [\App\Http\Controllers\CategorieController::class, 'edit'])->name('categories.edit');
    Route::post('categories/save', [\App\Http\Controllers\CategorieController::class, 'save'])->name('categories.save');
    Route::get('categories/delete/{id}', [\App\Http\Controllers\CategorieController::class, 'delete'])->name('categories.delete');

    Route::get('products/all', [\App\Http\Controllers\ProductController::class, 'all'])->name('products.all');
    Route::get('products', [\App\Http\Controllers\ProductController::class, 'one'])->name('products.one');
    Route::get('products/new', [\App\Http\Controllers\ProductController::class, 'addView'])->name('products.new');
    Route::post('products/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('products.add');
    Route::get('products/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::post('products/save', [\App\Http\Controllers\ProductController::class, 'save'])->name('products.save');
    Route::get('products/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('products.delete');
    Route::get('products/categorie', [\App\Http\Controllers\ProductController::class, 'allFromCategorie'])->name('products.categorie');

    Route::get('orders/all', [\App\Http\Controllers\OrderController::class, 'all'])->name('orders.all');
    Route::get('orders/my', [\App\Http\Controllers\OrderController::class, 'allForUser'])->name('orders.user');
    Route::get('orders/add', [\App\Http\Controllers\OrderController::class, 'add'])->name('orders.add')->middleware('guestby');
    Route::get('orders/create', [\App\Http\Controllers\OrderController::class, 'inputDataGuest'])->name('orders.create');
    Route::post('orders/createSave', [\App\Http\Controllers\OrderController::class, 'addDataGuestInSession'])->name('orders.createSave');

    Route::get('notifications/all', [\App\Http\Controllers\NotificationController::class, 'all'])->name('notifications.all');
    Route::get('notifications/new', [\App\Http\Controllers\NotificationController::class, 'addView'])->name('notifications.new');
    Route::post('notifications/add', [\App\Http\Controllers\NotificationController::class, 'add'])->name('notifications.add');
    Route::get('notifications/edit/{id}', [\App\Http\Controllers\NotificationController::class, 'edit'])->name('notifications.edit');
    Route::post('notifications/save', [\App\Http\Controllers\NotificationController::class, 'save'])->name('notifications.save');
    Route::get('notifications/delete/{id}', [\App\Http\Controllers\NotificationController::class, 'delete'])->name('notifications.delete');
});



require __DIR__.'/auth.php';
