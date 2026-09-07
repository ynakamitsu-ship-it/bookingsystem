<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
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
Route::get('/inn_main', [HomeController::class, 'innMain'])->name('inn_main');
Route::get('/mypage', [HomeController::class, 'mypage'])->name('mypage');
Route::get('/general_mypage', function () { return view('general_mypage');})->name('general_mypage');
Route::get('/account_edit', [HomeController::class, 'accountEdit'])->name('account_edit');
Route::post('/account_edit_conf', [HomeController::class, 'accountEditConf'])->name('account_edit_conf');
Route::post('/account_update', [HomeController::class, 'accountUpdate'])->name('account_update');
Route::get('/delete_account', [HomeController::class, 'deleteAccountPage']) ->name('delete_account');
Route::post('/delete_account', [HomeController::class, 'deleteAccount']) ->name('delete_account.post');
Route::get('/inn_mypage', [HomeController::class, 'innMypage']) ->name('inn_mypage');
Route::get('/inn_account_edit', [HomeController::class, 'innAccountEdit'])->name('inn_account_edit');
Route::post('/inn_account_edit_conf', [HomeController::class, 'innAccountEditConf'])->name('inn_account_edit_conf');
Route::post('/inn_account_update', [HomeController::class, 'innAccountUpdate'])->name('inn_account_update');
Route::get('/inn_delete_account', [HomeController::class, 'innDeleteAccount'])->name('inn_delete_account');
Route::post('/inn_delete_account', [HomeController::class, 'innDeleteAccountPost'])->name('inn_delete_account_post');
Route::get('/innbooking_list', [HomeController::class, 'innBookingList'])->name('innbooking_list');
Route::get('/innbooking/{id}/conf', [HomeController::class, 'innBookingConf'])->name('innbooking_conf');
Route::get('/store/register', function () { return view('auth.store_register');})->name('store.register');
Route::post('/store/register', [RegisterController::class, 'storeRegister'])->name('store-register.store');
Route::get('/account_edit', function () { return view('account_edit');})->name('account_edit');
Route::get('/mybooking', function () {return view('mybooking_list');})->name('mybooking_list');
Route::get('/booking/{id}/delete', [HomeController::class, 'deleteMybooking'])->name('booking.delete');
Route::post('/booking/{id}/delete', [HomeController::class, 'deleteMybookingPost'])->name('booking.delete.post');
Route::get('/bookmark_list', [HomeController::class, 'bookmarkList'])->name('bookmark_list');
Route::get('/mybooking', [HomeController::class, 'mybookingList'])->name('mybooking_list');
Route::get('/post/create', [HomeController::class, 'createPost'])->name('create_post');
Route::post('/post/confirm', [HomeController::class, 'confirmPost'])->name('post.confirm');
Route::post('/post/create', [HomeController::class, 'storePost'])->name('post.store');
Route::get('/post/{id}', [HomeController::class, 'post'])->name('post');
Route::get('/inn/post/{id}', [HomeController::class, 'innPost'])->name('inn_post');
Route::post('/post/{id}/bookmark', [HomeController::class, 'bookmark'])->name('bookmark');
Route::get('/booking/{id}', [HomeController::class, 'booking']);
Route::get('/booking/{id}/conf', [HomeController::class, 'bookingConf'])->name('booking_conf');
Route::post('/booking/{id}/reserve', [HomeController::class, 'reserve']);
Route::get('/booking_comp', function () {return view('booking_comp');});
Route::delete('/post/{id}', [HomeController::class, 'deletePost'])->name('post_delete');
Route::get('/report/{id}', [HomeController::class, 'report']);
Route::post('/report/{id}/conf', function ($id) {$post = \App\Models\Post::findOrFail($id);$reason = 
request('reason');return view('report_conf', ['reason' => $reason,'post' => $post]);})->name('report.conf');
Route::post('/report/{id}/comp', [HomeController::class, 'reportComplete'])->name('report_comp');
Route::get('/inn/report/{id}', [HomeController::class, 'innReport'])->name('inn_report');
Route::post('/inn/report/{id}/conf', [HomeController::class, 'innReportConf'])->name('inn_report_conf');
Route::post('/inn/report/{id}/comp', [HomeController::class, 'innReportComp'])->name('inn_report_comp');
Route::get('/edit_post/{id}', [HomeController::class, 'editPost'])->name('edit_post');
Route::post('/edit_post/{id}/conf', [HomeController::class, 'editPostConf'])->name('edit_post_conf');
Route::post('/edit_post/{id}', [HomeController::class, 'updatePost'])->name('edit_post.update');
