<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BackController;

//route author

Route::group(['middleware' => 'auth'], function () {
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
            Route::post("/avatar", [AuthorController::class, 'updateAvatar'])->whereNumber("id")->name('update-avatar');
        });
    });
});

// User

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\RegisterAuthorController::class, 'logout'])->name('cusLogout');
Route::get('/', [App\Http\Controllers\HandleData::class, 'getData'])->name('index');
Route::get('/{id?}', [App\Http\Controllers\HandleData::class, 'nav'])->name('nav');
// Route::get('/', [App\Http\Controllers\HandleData::class, 'getData'])->name('index');
Route::post('/', [App\Http\Controllers\HandleData::class, 'search']);

Route::prefix('/register-author')->group(function () {
    Route::get('/', [App\Http\Controllers\RegisterAuthorController::class, 'index'])->name('register-author');
    Route::post('/', [App\Http\Controllers\RegisterAuthorController::class, 'create']);
});

Route::prefix('/news')->group(function () {
    Route::get('/item/{id?}', [App\Http\Controllers\HandleData::class, 'news'])->name('news');
    Route::get('/latest', [App\Http\Controllers\HandleData::class, 'latest'])->name('latest');
    Route::get('/oldest', [App\Http\Controllers\HandleData::class, 'oldest'])->name('oldest');
});


//Admin

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

    //post need check
    Route::group(['prefix' => 'post-process'], function () {
        Route::get('list',  [BackController::class, 'post_process_list']);
        Route::get('accept/{id}', [BackController::class, 'post_process_accept']);
        Route::get('refuse/{id}', [BackController::class, 'post_process_refuse']);
        // Route::post('edit/{id}',  [BackController::class, 'page_edit_post']);
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