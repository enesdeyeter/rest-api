<?php

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

Route::get('/',[\App\Http\Controllers\Web\AuthController::class, 'home']);

Route::get('page-login',[\App\Http\Controllers\Web\AuthController::class, 'pageLogin'])->name('login');
Route::post('login',[\App\Http\Controllers\web\AuthController::class, 'login'])->name('login-post');

Route::get('page-register',[\App\Http\Controllers\Web\AuthController::class, 'pageRegister'])->name('register');
Route::post('register',[\App\Http\Controllers\web\AuthController::class, 'register'])->name('register-post');

Route::middleware('isLogin')->middleware('auth:web')->group(function (){
    Route::get('profile', [\App\Http\Controllers\Web\UserController::class, 'profile']);
    Route::get('logout', [\App\Http\Controllers\Web\AuthController::class, 'logout'])->name('logout');
});

/*Route::get('/', function () {
    return view('welcome');
});*/
