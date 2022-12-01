<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackController;

//route author

Route::prefix('author')->name('author.')->group(function () {
    //route generate
    Route::get("/", [AuthorController::class, 'index'])->name('index');
    Route::get("/add-news", [AuthorController::class, 'addNews'])->name('add-news');
    Route::post("/post-news", [AuthorController::class, 'postNews'])->name('post-news');
    Route::get("/list-news", [AuthorController::class, 'listNews'])->name('list-news');

    //route management
    Route::prefix('management')->name('management.')->group(function () {
        Route::get("/password", [AuthorController::class, 'changePassword'])->name('management-password');
        Route::post("/password", [AuthorController::class, 'changedPassword'])->name('changed-password');
        Route::get("/information", [AuthorController::class, 'changeInformation'])->name('management-information');
        Route::post("/information", [AuthorController::class, 'changedInformation'])->name('changed-information');
        Route::get("/avatar", [AuthorController::class, 'changeAvatar'])->name('management-avatar');
        Route::post("/avatar", [AuthorController::class, 'updateAvatar'])->name('update-avatar');
    });
});

//route welcome

Route::get('/', function () {
    return view("welcome");
});

//route login

Route::get('/login', [UserController::class, 'getLogin'])->name("login");
Route::post('/login', [UserController::class, 'postLogin']);
Route::get('/logout', [UserController::class, 'getLogout']);

//route admin

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', [BackController::class, 'home']);
    //staff
    Route::group(['prefix' => 'staff'], function () {
        Route::get('profile', [BackController::class, 'staff_profile']);
        Route::post('profile', [BackController::class, 'staff_profile_post']);
        Route::get('list', [BackController::class, 'staff_list']);
        Route::get('add', [BackController::class, 'staff_add']);
        Route::post('add', [BackController::class, 'staff_add_post']);
        Route::get('edit/{id}', [BackController::class, 'staff_edit']);
        Route::post('edit/{id}', [BackController::class, 'staff_edit_post']);
        Route::get('delete/{id}', [BackController::class, 'staff_delete']);
    });

    //system
    Route::get('/system', [BackController::class, 'system']);
    Route::post('/system', [BackController::class, 'system_post']);

    //page
    Route::group(['prefix' => 'page'], function () {
        Route::get('list',  [BackController::class, 'page_list']);
        Route::get('edit/{id}', [BackController::class, 'page_edit']);
        Route::post('edit/{id}',  [BackController::class, 'page_edit_post']);
    });

    //Social Network
    Route::group(['prefix' => 'social'], function () {
        Route::get('list',  [BackController::class, 'social_list']);
        Route::get('edit/{id}',  [BackController::class, 'social_edit']);
        Route::post('edit/{id}', [BackController::class, 'social_edit_post']);
    });

    //contact 
    Route::group(['prefix' => 'contact'], function () {
        Route::get('list', [BackController::class, 'contact_list']);
        Route::get('edit/{id}', [BackController::class, 'contact_edit']);
        Route::post('edit/{id}', [BackController::class, 'contact_edit_post']);
        Route::get('delete/{id}', [BackController::class, 'contact_delete']);
    });
});