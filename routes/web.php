<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
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
    Route::get('login', 'loginIndex')->name('login.index');
    Route::post('login', 'login')->name('login');
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

        //settings
        Route::resource('settings', SettingController::class);
        Route::get('settings-list', [SettingController::class, 'list'])->name('settings.list');
    });
});
