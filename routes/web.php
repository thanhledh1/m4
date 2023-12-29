<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CustomerController;




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

// bang categories
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
});
Route::get('/search1', [ProductController::class, 'search'])->name('product.search');


//layouts
Route::get('/master', function () {
    return view('masteradmin');
});
Route::get('/masteruser', function () {
    return view('masteruser');
});


Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/{id}/show', [ShopController::class, 'show'])->name('shop.show');
    Route::get('/search2', [ShopController::class, 'search'])->name('shop.search');
});

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('cart', [ShopController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');

Route::get('/master1', function () {
    return view('masteruser1');
});

//chuyen doi ngon ngu
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');





Route::get('/test', function () {
    return view('test');
});

//danhmuc
Route::get('apple', [ShopController::class, 'apple'])->name('shop.apple');
Route::get('samsung', [ShopController::class, 'samsung'])->name('shop.samsung');
Route::get('vivo', [ShopController::class, 'vivo'])->name('shop.vivo');
Route::get('xiaomi', [ShopController::class, 'xiaomi'])->name('shop.xiaomi');
// login
Route::get('/register', [CustomerController::class, 'register'])->name('shop.register');
Route::post('/checkregister', [CustomerController::class, 'checkregister'])->name('shop.checkregister');
Route::get('/login-index', [CustomerController::class, 'indexlogin'])->name('login.index');
Route::post('/login', [CustomerController::class, 'checklogin'])->name('shop.checklogin');

Route::get('/checkout', [CustomerController::class, 'checkOut'])->name('checkOut');
Route::post('/checkout', [CustomerController::class, 'logout'])->name('logout');



