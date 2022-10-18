<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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



Route::get('/', [HomeController::class, 'index']);
Route::post('register',[HomeController::class,'register'])->name('register');
Route::post('api/fetch-states', [HomeController::class, 'fetchState']);
Route::post('api/fetch-cities', [HomeController::class, 'fetchCity']);