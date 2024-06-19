<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PagesController;

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

Route::get('/', [PagesController::class,'index'])->name('index');
Route::get('/article/{id}', [PagesController::class,'article']);

Route::post('/get/blogs', [MainController::class,'blogs']);
Route::post('/review/new', [MainController::class,'review_new']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [PagesController::class, 'admin_login'])->name('admin_login');
    Route::post('/login', [AdminController::class, 'login']);

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin_index');
        Route::post('/article/delete/{id}', [AdminController::class, 'article_delete']);
        Route::get('/article/edit/{id}', [AdminController::class, 'article_edit']);
        Route::get('/article/new', [AdminController::class, 'article_newpage'])->name('admin_article_new');
        Route::post('/article/save/{id}', [AdminController::class, 'article_save']);
        Route::post('/article/new', [AdminController::class, 'article_new']);
    });
});
