<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| ログイン前でもアクセスできるページ
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'top'])->name('top');

Route::get('/error', function () {
    return view('error');
})->name('error');

Route::post('/register/confirm', [RegisterController::class, 'registerConfirm'])
    ->name('register.confirm');

Route::get('/signup/complete', function () {
    return view('auth.signup_comp');
})->name('signup.complete');

Route::get('/password/reset/send-complete', function () {
    return view('auth.passwords.send_complete');
})->name('password.reset.send.complete');

Route::get('/password/reset/complete', function () {
    return view('auth.passwords.complete');
})->name('password.reset.complete');

Auth::routes();


/*
|--------------------------------------------------------------------------
| 店舗登録
|--------------------------------------------------------------------------
*/

Route::get('/store/register', function () {
    return view('auth.store_register');
})->name('store.register');

Route::post('/store/register/confirm',
    [RegisterController::class, 'storeRegisterConfirm']
)->name('store-register.confirm');

Route::post('/store/register',
    [RegisterController::class, 'storeRegister']
)->name('store-register.store');

Route::get('/store/register/complete', function () {
    return view('auth.store_register_comp');
})->name('store-register.complete');


/*
|--------------------------------------------------------------------------
| 一般ユーザー
| role = 0
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:0'])->group(function () {

    Route::get('/home',
        [HomeController::class, 'index']
    )->name('home');

    Route::get('/mypage',
        [HomeController::class, 'mypage']
    )->name('mypage');

    Route::get('/general_mypage', function () {
        return view('general_mypage');
    })->name('general_mypage');


    // -------------------------
    // アカウント編集
    // -------------------------

    Route::get('/account_edit',
        [HomeController::class, 'accountEdit']
    )->name('account_edit');

    Route::post('/account_edit_conf',
        [HomeController::class, 'accountEditConf']
    )->name('account_edit_conf');

    Route::post('/account_update',
        [HomeController::class, 'accountUpdate']
    )->name('account_update');

    Route::get('/delete_account',
        [HomeController::class, 'deleteAccountPage']
    )->name('delete_account');

    Route::post('/delete_account',
        [HomeController::class, 'deleteAccount']
    )->name('delete_account.post');


    // -------------------------
    // 自分の予約
    // -------------------------

    Route::get('/mybooking',
        [HomeController::class, 'mybookingList']
    )->name('mybooking_list');

    Route::get('/mybooking/{id}/conf',
        [HomeController::class, 'mybookingConf']
    )->name('mybooking_conf');

    Route::get('/mybooking/{id}/edit',
        [HomeController::class, 'mybookingEdit']
    )->name('mybooking_edit');

    Route::post('/mybooking/{id}/edit/conf',
        [HomeController::class, 'mybookingEditConf']
    )->name('mybooking_edit_conf');

    Route::post('/mybooking/{id}/update',
        [HomeController::class, 'mybookingUpdate']
    )->name('mybooking_update');

    Route::get('/booking/{id}/delete',
        [HomeController::class, 'deleteMybooking']
    )->name('booking.delete');

    Route::post('/booking/{id}/delete',
        [HomeController::class, 'deleteMybookingPost']
    )->name('booking.delete.post');


    // -------------------------
    // ブックマーク
    // -------------------------

    Route::get('/bookmark_list',
        [HomeController::class, 'bookmarkList']
    )->name('bookmark_list');

    Route::post('/post/{id}/bookmark',
        [HomeController::class, 'bookmark']
    )->name('bookmark');


    // -------------------------
    // 予約
    // -------------------------

    Route::get('/booking/{id}',
        [HomeController::class, 'booking']
    );

    Route::post('/booking/{id}/conf',
        [HomeController::class, 'bookingConfirm']
    )->name('booking_conf');

    Route::post('/booking/{id}/reserve',
        [HomeController::class, 'reserve']
    );

    Route::get('/booking_comp', function () {
        return view('booking_comp');
    });


    // -------------------------
    // 違反報告
    // -------------------------

    Route::get('/report/{id}',
        [HomeController::class, 'report']
    );

    Route::post('/report/{id}/conf',
        [HomeController::class, 'reportConf']
    )->name('report.conf');

    Route::post('/report/{id}/comp',
        [HomeController::class, 'reportComplete']
    )->name('report.comp');
});


/*
|--------------------------------------------------------------------------
| 旅館運営ユーザー
| role = 1
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:1'])->group(function () {

    Route::get('/inn_main',
        [HomeController::class, 'innMain']
    )->name('inn_main');

    Route::get('/inn_mypage',
        [HomeController::class, 'innMypage']
    )->name('inn_mypage');


    // -------------------------
    // アカウント編集
    // -------------------------

    Route::get('/inn_account_edit',
        [HomeController::class, 'innAccountEdit']
    )->name('inn_account_edit');

    Route::post('/inn_account_edit_conf',
        [HomeController::class, 'innAccountEditConf']
    )->name('inn_account_edit_conf');

    Route::post('/inn_account_update',
        [HomeController::class, 'innAccountUpdate']
    )->name('inn_account_update');

    Route::get('/inn_delete_account',
        [HomeController::class, 'innDeleteAccount']
    )->name('inn_delete_account');

    Route::post('/inn_delete_account',
        [HomeController::class, 'innDeleteAccountPost']
    )->name('inn_delete_account_post');


    // -------------------------
    // 予約一覧
    // -------------------------

    Route::get('/innbooking_list',
        [HomeController::class, 'innBookingList']
    )->name('innbooking_list');

    Route::get('/innbooking/{id}/conf',
        [HomeController::class, 'innBookingConf']
    )->name('innbooking_conf');


    // -------------------------
    // 新規投稿
    // -------------------------

    Route::get('/post/create',
        [HomeController::class, 'createPost']
    )->name('create_post');

    Route::post('/post/confirm',
        [HomeController::class, 'confirmPost']
    )->name('post.confirm');

    Route::post('/post/create',
        [HomeController::class, 'storePost']
    )->name('post.store');


    // -------------------------
    // 旅館側の投稿詳細
    // -------------------------

    Route::get('/inn/post/{id}',
        [HomeController::class, 'innPost']
    )->name('inn_post');

    Route::delete('/post/{id}',
        [HomeController::class, 'deletePost']
    )->name('post_delete');


    // -------------------------
    // 投稿編集
    // -------------------------

    Route::get('/edit_post/{id}',
        [HomeController::class, 'editPost']
    )->name('edit_post');

    Route::post('/edit_post/{id}/conf',
        [HomeController::class, 'editPostConf']
    )->name('edit_post_conf');

    Route::post('/edit_post/{id}',
        [HomeController::class, 'updatePost']
    )->name('edit_post.update');


    // -------------------------
    // 旅館側の違反報告
    // -------------------------

    Route::get('/inn/report/{id}',
        [HomeController::class, 'innReport']
    )->name('inn_report');

    Route::post('/inn/report/{id}/conf',
        [HomeController::class, 'innReportConf']
    )->name('inn_report_conf');

    Route::post('/inn/report/{id}/comp',
        [HomeController::class, 'innReportComp']
    )->name('inn_report_comp');
});


/*
|--------------------------------------------------------------------------
| 一般ユーザー・旅館運営ユーザー共通
| role = 0 または 1
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:0,1'])->group(function () {

    Route::get('/post/{id}',
        [HomeController::class, 'post']
    )->name('post');
});


/*
|--------------------------------------------------------------------------
| 管理者
| role = 2
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:2'])->group(function () {

    Route::get('/admin_main',
        [HomeController::class, 'adminMain']
    )->name('admin_main');


    // -------------------------
    // ユーザー管理
    // -------------------------

    Route::get('/user_list',
        [HomeController::class, 'userList']
    )->name('user_list');

    Route::get('/delete_user/{id}',
        [HomeController::class, 'deleteUser']
    )->name('delete_user');

    Route::post('/delete_user/{id}',
        [HomeController::class, 'deleteUserPost']
    )->name('delete_user.post');


    // -------------------------
    // 投稿管理
    // -------------------------

    Route::get('/post_list',
        [HomeController::class, 'postList']
    )->name('post_list');

    Route::get('/delete_post/{id}',
        [HomeController::class, 'deletePostPage']
    )->name('delete_post');

    Route::post('/delete_post/{id}',
        [HomeController::class, 'deletePostPost']
    )->name('delete_post.post');
});