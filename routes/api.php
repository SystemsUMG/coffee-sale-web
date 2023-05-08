<?php

use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function () {

});
Route::post('create/sale', [SaleController::class, 'store']);

Route::get('products/{product}/image-gallery', [ProductController::class, 'imageGallery'])->name('api.products.imageGallery');
