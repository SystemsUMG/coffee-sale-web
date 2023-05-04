<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginIndex');
    Route::post('/login', 'login')->name('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard');
    });
});
