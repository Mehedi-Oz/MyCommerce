<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\SslCommerzPaymentController;

//MyCommerceController
Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/product-category/{id}', [MyCommerceController::class, 'category'])->name('product-category');
Route::get('/product-detail/{id}', [MyCommerceController::class, 'detail'])->name('product-detail');

//CartController
Route::post('/cart/add/{id}', [CartController::class, 'index'])->name('cart.add');
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

//CheckoutController
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-cash-order', [CheckoutController::class, 'newCashOrder'])->name('new-cash-order');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

//CustomerAuthController
Route::get('/customer/login', [CustomerAuthController::class, 'index'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'loginCustomer'])->name('customer.login');
Route::get('/customer/register', [CustomerAuthController::class, 'registerShow'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'registerCustomer'])->name('customer.register');
Route::get('/customer/dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');
Route::get('/customer/profile', [CustomerAuthController::class, 'profile'])->name('customer.profile');
Route::get('/customer/account', [CustomerAuthController::class, 'accountCustomer'])->name('customer.account');
Route::get('/customer/changePassword', [CustomerAuthController::class, 'changePasswordCustomer'])->name('customer.changePassword');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

//CustomerOrderController
Route::get('/customer/order', [CustomerOrderController::class, 'allOrder'])->name('customer.order');


// SSLCOMMERZ Start
/*Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);*/

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
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

    //BrandController
    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand/new', [BrandController::class, 'create'])->name('brand.new');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/status/{id}', [BrandController::class, 'status'])->name('brand.status');
    Route::post('/brand/delete', [BrandController::class, 'remove'])->name('brand.delete');

    //UnitController
    Route::get('/unit/add', [UnitController::class, 'index'])->name('unit.add');
    Route::post('/unit/new', [UnitController::class, 'create'])->name('unit.new');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('unit.manage');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/status/{id}', [UnitController::class, 'status'])->name('unit.status');
    Route::post('/unit/delete', [UnitController::class, 'remove'])->name('unit.delete');

    //ProductController
    Route::get('/product/add', [ProductController::class, 'index'])->name('product.add');
    Route::get('/product/get-subcategory-by-category', [ProductController::class, 'getSubcategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::post('/product/new', [ProductController::class, 'create'])->name('product.new');
    Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/status/{id}', [ProductController::class, 'status'])->name('product.status');
    Route::post('/product/delete', [ProductController::class, 'remove'])->name('product.delete');
});
