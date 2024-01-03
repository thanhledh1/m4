<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('google', function () {
    return view('googleAuth');
});



//usẻ
// login
Route::get('/register', [CustomerController::class, 'register'])->name('shop.register');
Route::post('/checkregister', [CustomerController::class, 'checkregister'])->name('shop.checkregister');
Route::get('/login-index', [CustomerController::class, 'indexlogin'])->name('login.index');
Route::post('/login', [CustomerController::class, 'checklogin'])->name('shop.checklogin');
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/checkout', [CustomerController::class, 'checkOut'])->name('checkOut');
Route::post('/checkout', [CustomerController::class, 'logout'])->name('logout.user');


// shop
Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');;
    Route::get('/{id}/show', [ShopController::class, 'show'])->name('shop.show');
    Route::get('/search2', [ShopController::class, 'search'])->name('shop.search');
    Route::get('apple', [ShopController::class, 'apple'])->name('shop.apple');
    Route::get('samsung', [ShopController::class, 'samsung'])->name('shop.samsung');
    Route::get('vivo', [ShopController::class, 'vivo'])->name('shop.vivo');
    Route::get('xiaomi', [ShopController::class, 'xiaomi'])->name('shop.xiaomi');
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');
    Route::get('cart', [ShopController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');
    Route::post('/order', [ShopController::class, 'order'])->name('order');
});





Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('order.destroy');


});

Route::get('/adminlogin', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//adminư
Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/editpass/{id}', [UserController::class, 'editpass'])->name('user.editpass');
    Route::put('/updatepass/{id}', [UserController::class, 'updatepass'])->name('user.updatepass');
    Route::get('/adminpass/{id}', [UserController::class, 'adminpass'])->name('user.adminpass');
    Route::put('/adminUpdatePass/{id}', [UserController::class, 'adminUpdatePass'])->name('user.adminUpdatePass');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
Route::get('/search', [CategoryController::class, 'search'])->name('category.search');

//bang products
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/{id}/show', [ProductController::class, 'show'])->name('product.show');
    Route::post('/', [ProductController::class, 'store'])->name('product.store');
    Route::put('/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::put('softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
    Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
    Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
    Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('product_destroy');
});
Route::get('/search1', [ProductController::class, 'search'])->name('product.search');
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::group(['prefix' => 'groups'], function () {
    Route::get('/', [GroupController::class, 'index'])->name('group.index');
    Route::get('/create', [GroupController::class, 'create'])->name('group.create');
    Route::post('/store', [GroupController::class, 'store'])->name('group.store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
    Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
    Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
    Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');

});


});
