<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
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



Auth::routes();



Route::group(['middleware' => ['auth']], function () { 
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/home', [HomeController::class, 'adminhome'])->name('admin.home')->middleware('is_admin');


//Product Controller
Route::get('/product_details/{id}', [ProductController::class, 'product_details'])->name('product_details');
Route::get('/product/getdata', [ProductController::class, 'getdata'])->name('product.getdata')->middleware('is_admin');
Route::post('/product/buy',[ProductController::class, 'productBuy'])->name('product.buy');
Route::resource('/product',ProductController::class)->middleware('is_admin');


//order Controller
Route::get('/order/getdata', [OrderController::class, 'getdata'])->name('order.getdata')->middleware('is_admin');
Route::resource('/order',OrderController::class)->middleware('is_admin');
});