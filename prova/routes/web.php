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

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'login'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'home'])->name('site.home');

Route::post('/bookstore/add', [\App\Http\Controllers\BookStoreController::class, 'add'])->name('site.bookstore.add');

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('site.logout');

Route::get('/', function () {
    return redirect()->route('site.login');
});

