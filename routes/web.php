<?php

use App\Http\Controllers\NewsController as NewsControllerAlias;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'doLogin'])->name('doLogin');

Route::prefix('/')->group(function () {
    Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class, 'index']);
    Route::get('/categories/{category_id}', [\App\Http\Controllers\Frontend\FrontendController::class, 'webCategory'])->name('wb.cat');
    Route::get('/new/{news_id}', [\App\Http\Controllers\Frontend\FrontendController::class, 'newsDetails'])->name('wb.news');
    Route::get('/contact', [\App\Http\Controllers\Frontend\FrontendController::class, 'webContact']);
    Route::resource('/comment', \App\Http\Controllers\Frontend\CommentController::class);
    Route::resource('/visitor_login', \App\Http\Controllers\VisitorLoginController::class);
    Route::post('/visitor_do_login', [\App\Http\Controllers\VisitorLoginController::class, 'visitor_do_login'])->name('visitor_do_login');
    Route::get('/change', [\App\Http\Controllers\Frontend\localization::class, 'change'])->name('changeLang');
    Route::get('/admin_comment', [\App\Http\Controllers\Frontend\CommentController::class, 'commentList'])->name('admin_comment');
});


Route::prefix('admin')->middleware('authCheck')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');


    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::resource('category', \App\Http\Controllers\Backend\CategoryController::class);

});
