<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProdectConteoller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserConteoller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainConteoller;
use App\Http\Controllers\PaymentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function(){



Route::prefix('admin')->name('admin.')->middleware('auth','check_user')->group(function(){

Route::get('/',[AdminController::class,'index'])->name('index');

        Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
        Route::get('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('categories/{id}/forcedelete', [CategoryController::class, 'forcedelete'])->name('categories.forcedelete');
        Route::resource('categories', CategoryController::class);


//Prodects routes
        Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
        Route::get('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
        Route::delete('products/{id}/forcedelete', [ProductController::class, 'forcedelete'])->name('products.forcedelete');
        Route::resource('products', ProductController::class);

        Route::get('users',[UserConteoller::class,'index'])->name('users.index');
        Route::delete('users/{id}',[UserConteoller::class,'destroy'])->name('users.destroy');

        // Route::get('payment',[PaymentController::class,'index'])->name('payment.index');
        // Route::delete('payment/{id}',[PaymentController::class,'destroy'])->name('payment.destroy');


    });
    Auth::routes();

   // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('not_allowed','not_allowed');




    //wepsite Routes

    Route::get('/',[MainConteoller::class,'home'])->name('site.index');
    Route::get('/shop',[MainConteoller::class,'shop'])->name('site.shop');
    Route::get('/category/{id}',[MainConteoller::class,'category'])->name('site.category');
    Route::get('/search',[MainConteoller::class,'search'])->name('site.search');
    Route::get('/product/{id}',[MainConteoller::class,'product'])->name('site.product');


    Route::post('add_to_cart',[CartController::class,'add_to_cart'])->name('site.add_to_cart');

    Route::get('/cart',[CartController::class,'cart'])
    ->name('site.cart')->middleware('auth');

    Route::delete('/cart/{id}',[CartController::class,'delete_cart'])
    ->name('site.delete_cart')->middleware('auth');

    Route::get('/checkout',[CartController::class,'checkout'])
    ->name('site.checkout')->middleware('auth');

    Route::get('/payment',[CartController::class,'payment'])
    ->name('site.payment')->middleware('auth');

    Route::get('/payment/success', [CartController::class, 'success'])
    ->name('site.success')->middleware('auth');

    Route::get('/payment/fail', [CartController::class, 'fail'])
    ->name('site.fail')->middleware('auth');


});

