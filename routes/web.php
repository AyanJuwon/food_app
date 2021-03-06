<?php

use App\Mail\MyTestMail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoriesController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index']);


// Routes without middleware protection


    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

    Route::post('/cart', [App\Http\Controllers\CartController::class,'store'])->name('cart.store');

    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class , 'destroy'])->name('cart.destroy');

    Route::patch('/cart/{rowId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

    Route::get('menu-list', [App\Http\Controllers\UserController::class, 'index'])->name('menus.list');

    Route::get('menu-list/search', [App\Http\Controllers\HomeController::class, 'search'])->name('menus.search');

    Route::get('menu-list/{category}', [App\Http\Controllers\UserController::class, 'categoryFilter'])->name('category');

    Route::get('menu/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('menu');



// Admin functions
// Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('menus', MenuController::class);

    Route::resource('categories', CategoriesController::class);

    Route::resource('admin', AdminController::class);

    Route::get('pending', [App\Http\Controllers\AdminController::class, 'adminViewPendingOrders'])->name('admin.pending');

    Route::get('cancelled', [App\Http\Controllers\AdminController::class ,'adminViewCancelledOrders'])->name('admin.cancelled');

    Route::get('completed', [App\Http\Controllers\AdminController::class,'adminViewCompletedOrders'])->name('admin.completed');

    Route::get('orderDetails/{order}', [App\Http\Controllers\AdminController::class,'viewOrderDetails'])->name('adminViewOrder');

    Route::post('/pending/process/{id}',[App\Http\Controllers\AdminController::class, 'processOrders'])->name('admin.processOrder');

    Route::post('/pending/complete/{id}',[App\Http\Controllers\AdminController::class, 'completeOrders'])->name('admin.completeOrder');

    Route::post('/pending/cancel/{id}', [App\Http\Controllers\AdminController::class, 'cancelOrders'])->name('admin.cancelOrder');

    Route::get('users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');

    Route::delete('users/delete/{id}',[App\Http\Controllers\UserController::class , 'destroy'])->name('user.destroy');
// });


// // User functions
// Route::middleware(['auth'])->group(function(){

    Route::get('/checkout', [App\Http\Controllers\UserController::class, 'checkout'])->name('checkout');

    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/orders', [App\Http\Controllers\UserController::class ,'orders'])->name('orders');

    Route::get('order/{order}', [App\Http\Controllers\UserController::class , 'viewOrderDetails'])->name('myOrder');

    Route::get('orders/track/{id}', [App\Http\Controllers\UserController::class, 'trackOrder'])->name('tracking');

    Route::get('saved-items', [App\Http\Controllers\UserController::class, 'savedItems'])->name('savedItems');

    Route::post('/save-item/{id}', [App\Http\Controllers\CartController::class,'saveItem'])->name('cart.saveItem');

    Route::post('/complete-checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('payment.complete');

    Route::get('/failed-checkout', [App\Http\Controllers\UserController::class, 'checkoutFailed'])->name('payment.failed');

Auth::routes();
Route::get('/admin-dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
