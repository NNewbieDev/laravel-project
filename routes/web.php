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
use App\Http\Controllers\AuthorController;
// Author
Route::prefix('author')->name('author.')->group(function () {
    Route::get("/", [AuthorController::class, 'index'])->name('index');
    Route::get("/add-news", [AuthorController::class, 'addNews'])->name('add-news');
    Route::post("/post-news", [AuthorController::class, 'postNews'])->name('post-news');
    Route::get("/list-news", [AuthorController::class, 'listNews'])->name('list-news');
    Route::get("/password", [AuthorController::class, 'changePassword'])->name('management.management-password');
    Route::post("/password", [AuthorController::class, 'changedPassword'])->name('management.changed-password');
    Route::get("/information", [AuthorController::class, 'changeInformation'])->name('management.management-information');
    Route::post("/information", [AuthorController::class, 'changedInformation'])->name('management.changed-information');
    Route::get("/avatar", [AuthorController::class, 'changeAvatar'])->name('management.management-avatar');
    Route::post("/avatar", [AuthorController::class, 'updateAvatar'])->name('management.update-avatar');
});

// Admin

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\RegisterAuthorController::class, 'logout'])->name('cusLogout');
Route::get('/', [App\Http\Controllers\HandleData::class, 'getData'])->name('index');
Route::post('/', [App\Http\Controllers\HandleData::class, 'search']);

Route::prefix('/register-author')->group(function () {
    Route::get('/', [App\Http\Controllers\RegisterAuthorController::class, 'index'])->name('register-author');
    Route::post('/', [App\Http\Controllers\RegisterAuthorController::class, 'create']);
});

Route::prefix('/news')->group(function () {
    Route::get('/latest', [App\Http\Controllers\HandleData::class, 'latest'])->name('latest');
    Route::get('/oldest', [App\Http\Controllers\HandleData::class, 'oldest'])->name('oldest');
});
