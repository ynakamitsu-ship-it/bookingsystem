<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function() {

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{id}', [HomeController::class, 'post']);
Route::get('/booking/{id}', [HomeController::class, 'booking']);
Route::post('/booking/{id}/confirm', [HomeController::class, 'bookingConfirm']);
Route::post('/booking/{id}/reserve', [HomeController::class, 'reserve']);