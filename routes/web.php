<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

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

Route::prefix('author')->name('author.')->group(function () {
    Route::get("/", [AuthorController::class, 'index'])->name('index');
    Route::get("/add-news", [AuthorController::class, 'addNews'])->name('add-news');
    Route::post("/post-news", [AuthorController::class, 'postNews'])->name('post-news');
    Route::get("/list-news", [AuthorController::class, 'listNews'])->name('list-news');
    Route::get("/password", [AuthorController::class, 'changePassword'])->name('management.management-password');
    Route::get("/information", [AuthorController::class, 'changeInformation'])->name('management.management-information');
    Route::get("/avatar", [AuthorController::class, 'changeAvatar'])->name('management.management-avatar');
    Route::post("/avatar", [AuthorController::class, 'updateAvatar'])->name('management.update-avatar');
});

Route::get('/', function () {
    return view("welcome");
});