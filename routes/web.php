<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;


//MyCommerceController
Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/product-category', [MyCommerceController::class, 'category'])->name('product-category');
Route::get('/product-detail', [MyCommerceController::class, 'detail'])->name('product-detail');

//CartController
Route::get('/cart/show', [CartController::class, 'index'])->name('cart/show');

//CheckoutController
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //CategoryController
    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/new', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
    Route::post('/category/delete', [CategoryController::class, 'remove'])->name('category.delete');

    //SubCategoryController
    Route::get('/subcategory/add', [SubCategoryController::class, 'index'])->name('subcategory.add');
    Route::post('/subcategory/new', [SubCategoryController::class, 'create'])->name('subcategory.new');
    Route::get('/subcategory/manage', [SubCategoryController::class, 'manage'])->name('subcategory.manage');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/status/{id}', [SubCategoryController::class, 'status'])->name('subcategory.status');
    Route::post('/subcategory/delete', [SubCategoryController::class, 'remove'])->name('subcategory.delete');
});
