<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\SaleDetailController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;

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

//shopping
Route::resource('/', HomeController::class);

Route::controller(AuthController::class)->middleware('guest')->prefix('/')->group(function () {
    //login
    Route::get('login', 'loginIndex')->name('login.index');
    Route::post('login', 'login')->name('login');
    //register
    Route::get('register', 'registerIndex')->name('register.index');
    Route::post('register', 'register')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('check.if.admin')->prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('home');

        //products
        Route::resource('products', ProductController::class);
        Route::get('products-list', [ProductController::class, 'list'])->name('product.list');
        Route::post('product/images/{product}', [ProductController::class, 'images']);
        Route::post('product/delete', [ProductController::class, 'deleteImages']);
        Route::get('images/{id}', [ProductController::class, 'showImages']);

        //users
        Route::resource('users', UserController::class);
        Route::get('users-list', [UserController::class, 'list'])->name('users.list');
        Route::get('user/image/{id}', [UserController::class, 'showImage']);
        Route::post('user/image/{user}', [UserController::class, 'image']);
        Route::post('user-image/delete', [UserController::class, 'deleteImage']);

        //purchases
        Route::resource('purchases', PurchaseController::class);
        Route::get('purchases-list', [PurchaseController::class, 'list'])->name('purchases.list');
        Route::get('purchase/image/{id}', [PurchaseController::class, 'showImage']);
        Route::post('purchase/image/{purchase}', [PurchaseController::class, 'image']);
        Route::post('purchase-image/delete', [PurchaseController::class, 'deleteImage']);

        //Settings
        Route::resource('settings', SettingController::class);
        Route::get('settings-list', [SettingController::class, 'list'])->name('settings.list');

        //Sales
        Route::controller(SaleController::class)->group(function () {
            Route::resource('sales', SaleController::class);
            Route::get('sales-list', 'listSales')->name('sales.list');
            Route::get('tracking', 'tracking')->name('tracking');
            Route::post('update-tracking/{sale}', 'updateTracking');
        });

        //Sale Details
        Route::resource('sale-details', SaleDetailController::class);
    });
});
