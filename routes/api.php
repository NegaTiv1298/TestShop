<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/{pagination?}', [ApiController::class, 'getAllProducts']);
Route::get('/categories', [ApiController::class, 'getAllCategories']);
Route::get('/category/{code}', [ApiController::class, 'getCategoryProducts']);
Route::get('/product/{code}', [ApiController::class, 'getProduct']);
Route::prefix('products/filter=')->group(function () {
    Route::get('/{filter}:{sort?}/{paginate?}', [ApiController::class, 'getSortProducts']);
});
Route::get('/orders', [ApiController::class, 'getOrdersList']);
Route::post('/order/create', [ApiController::class, 'createOrder']);
