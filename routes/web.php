<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\ReadRss::class, 'read'])->name("index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register-author', [App\Http\Controllers\RegisterAuthorController::class, 'index'])->name('register-author');
Route::post('register-author', [App\Http\Controllers\RegisterAuthorController::class, 'create']);
Route::get('/logout', [App\Http\Controllers\RegisterAuthorController::class, 'logout'])->name('cusLogout');
