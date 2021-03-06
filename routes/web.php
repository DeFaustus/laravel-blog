<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/semuapost/', [PostController::class, 'semuaPost']);
Route::get('/lihatpost/{post:slug}', [PostController::class, 'lihatPost']);
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/home', [DashboardController::class, 'index']);
    Route::get('/tambahpost', [DashboardController::class, 'tambahpost']);
    Route::get('/postsaya', [DashboardController::class, 'postsaya']);
    Route::post('/store', [DashboardController::class, 'store']);
    Route::get('/edit/{post:id}', [DashboardController::class, 'edit']);
    Route::post('/storeupdate', [DashboardController::class, 'storeUpdate']);
    Route::get('/logout', [DashboardController::class, 'logout']);
    Route::delete('/hapus', [DashboardController::class, 'hapus']);
});
Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {
    Route::get('/daftarkategori', [KategoriController::class, 'index']);
    Route::resource('kategori', KategoriController::class);
});
