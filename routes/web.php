<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MainController::class, 'show'])
    ->name('index');
Route::get('/categories', [MainController::class, 'categories'])
    ->name('categories.show');
Route::get('/category/{code}', [MainController::class, 'getCategory'])
    ->name('category.show');
Route::get('/product/list', [ProductController::class, 'show'])
    ->name('products.show');
Route::get('/product/{code}', [ProductController::class, 'card'])
    ->name('product.card');
Route::get('/product/buy/{code}', [ProductController::class, 'buy'])
    ->name('product.buy');
Route::get('/product/edit/{code}', [ProductController::class, 'getEditView'])
    ->name('product.edit');
Route::post('/product/edit/post', [ProductController::class, 'edit'])
    ->name('product.edit.post');
Route::get('/orders', [OrdersController::class, 'showOrders'])
    ->name('orders.show');
Route::post('/order/create', [OrdersController::class, 'createOrder'])
    ->name('order.create');
