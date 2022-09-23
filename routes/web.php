<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
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

Route::namespace('Frontend')->group(function () {
    Route::get('/', [HomeController::class, 'showHomePage'])->name('home');
    Route::get('/product/{slug}', [ProductController::class, 'productDetails'])->name('product.detail');

    //cart
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'processRegister'])->name('register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'processLogin'])->name('login');

    Route::get('/activate/{token}', [AuthController::class, 'activate'])->name('activate');


    //facebook login
    Route::get('login/facebook', [AuthController::class, 'redirectToFacebook'])->name("login.facebook");
    Route::get('login/facebook/callback',  [AuthController::class, 'handleFacebookCallback']);

    //google login
    Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name("login.google");
    Route::get('login/google/callback',  [AuthController::class, 'handleGoogleCallback']);


    Route::group(['middleware'=>'auth'],function () {

        Route::post('/order', [CartController::class, 'processOrder'])->name('order');


        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    });


});


//admin
Route::prefix('admin')->namespace('Backend')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'showDashboard']);

    //categories
    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::post('/categories/create', [CategoryController::class, 'store']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::put('/categories/{category}/update', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}/delete', [CategoryController::class, 'delete']);
});



