<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthUserAPIController;

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
Route::get('/carshop', function(){
    return view('/carshop');
})->name('carshop');


Route::get('/'     , [HomeController::class, 'index'])->name('index');

Route::group(['prefix' => 'categories', 'controller' => CategoryController::class], function () {
    Route::get('/'     , 'index')->name('categories.index');
    Route::get('/{id}' , 'getCategory')->name('categories.getCategory');
    Route::post('/'    , 'store')->name('categories.store');
    Route::put('/edit' , 'edit')->name('categories.edit');
    Route::delete('/'  , 'destroy')->name('categories.destroy');
    //->middleware('can:categories.index');
});

Route::group(['prefix' => 'products', 'controller' => ProductController::class], function () {
    Route::get('/'     , 'index')->name('product.index');
    Route::get('/{id}' , 'getProduct')->name('product.getProduct');
    Route::post('/ap' , 'productCar')->name('product.productCar');
    Route::post('/'    , 'store')->name('product.store');
    Route::put('/edit' , 'edit')->name('product.edit');
    Route::delete('/'  , 'destroy')->name('product.destroy');
    //->middleware('can:categories.index');
});
