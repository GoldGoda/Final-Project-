<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserAPIController;

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

Route::post('/login', [AuthUserAPIController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::post('/logout', [AuthUserAPIController::class, 'logout'])->name('logout');
    return $request->user();
});
