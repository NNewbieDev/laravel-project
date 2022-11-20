<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

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

Route::get('/', function () {
    return view("welcome");
});