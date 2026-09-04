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
Route::get('/mypage', [HomeController::class, 'mypage'])->name('mypage');
Route::get('/general_mypage', function () { return view('general_mypage');})->name('general_mypage');
Route::get('/store/register', function () { return view('auth.store_register');})->name('store.register');
Route::post('/store/register', [HomeController::class, 'storeRegister'])->name('store-register.store');
Route::get('/account_edit', function () { return view('account_edit');})->name('account_edit');
Route::get('/mybooking', function () {return view('mybooking_list');})->name('mybooking_list');
Route::get('/bookmark_list', [HomeController::class, 'bookmarkList'])->name('bookmark_list');
Route::get('/post/{id}', [HomeController::class, 'post'])->name('post');
Route::post('/post/{id}/bookmark', [HomeController::class, 'bookmark'])->name('bookmark');
Route::get('/booking/{id}', [HomeController::class, 'booking']);
Route::post('/booking/{id}/confirm', [HomeController::class, 'bookingConfirm']);
Route::post('/booking/{id}/reserve', [HomeController::class, 'reserve']);
Route::get('/booking_comp', function () {return view('booking_comp');});
Route::get('/report/{id}', [HomeController::class, 'report']);
Route::post('/report/{id}/conf', function ($id) {$post = \App\Models\Post::findOrFail($id);$reason = 
request('reason');return view('report_conf', ['reason' => $reason,'post' => $post]);})->name('report.conf');
Route::post('/report/{id}/comp', [HomeController::class, 'reportComplete'])->name('report_comp');
