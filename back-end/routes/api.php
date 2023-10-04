<?php

use App\Http\Controllers\Api\ApiArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Facades\JWTAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('register', [App\Http\Controllers\Api\ApiUserController::class, 'register']);
Route::post('register', [App\Http\Controllers\Api\ApiUserController::class, 'register']);

Route::group([
          'middleware' => 'api',
          'prefix' => 'auth'
], function ($router) {
          Route::get('/user', function () {
                    return auth('api')->user();
          });
          Route::post('login', [App\Http\Controllers\Api\ApiUserController::class, 'login']);
          Route::post('logout', [App\Http\Controllers\Api\ApiUserController::class, 'logout']);
          Route::post('refresh', [App\Http\Controllers\Api\ApiUserController::class, 'refresh']);
          // PUT Truyen bang raw data
          // Update có file dùng post
          Route::put('update', [App\Http\Controllers\Api\ApiUserController::class, 'update']);
          Route::put('update/password', [App\Http\Controllers\Api\ApiUserController::class, 'changePassword']);
          Route::put('send', [App\Http\Controllers\Api\ApiUserController::class, 'send']);
          Route::put('{id}/role-up', [App\Http\Controllers\Api\ApiUserController::class, 'levelUp'])->middleware("checkRole:3,3");
          Route::post('{id}/delete', [App\Http\Controllers\Api\ApiUserController::class, 'destroy'])->middleware("checkRole:3,3");
          Route::post('me', [App\Http\Controllers\Api\ApiUserController::class, 'me']);
          Route::get('user/get', [App\Http\Controllers\Api\ApiUserController::class, 'getUsers'])->middleware("checkRole:3,3");
          Route::get('user/article', [App\Http\Controllers\Api\ApiArticleController::class, 'user'])->middleware("checkRole:2,3");
          Route::get('user/sent', [App\Http\Controllers\Api\ApiUserController::class, 'getUserSent'])->middleware("checkRole:3,3");
});

Route::prefix("article")->group(function () {
          Route::get('/', [App\Http\Controllers\Api\ApiArticleController::class, "index"])->name('article.index');
          Route::post('/create', [App\Http\Controllers\Api\ApiArticleController::class, "store"])->middleware(["api", "checkRole:2,3"])->name('article.store');
          Route::get('/wait', [App\Http\Controllers\Api\ApiArticleController::class, 'getArticleWaiting'])->middleware(["api", "checkRole:3,3"]);
          Route::post('/{id}/delete', [App\Http\Controllers\Api\ApiArticleController::class, "destroy"])->middleware(["api", "checkRole:2,3"])->name('article.destory');
          // PUT Truyen bang raw data
          Route::put('{id}/update', [App\Http\Controllers\Api\ApiArticleController::class, "update"])->middleware(["api", "checkRole:2,3"])->name('article.update');
          Route::put('/{id}/accept', [App\Http\Controllers\Api\ApiArticleController::class, "accept"])->middleware(["api", "checkRole:3,3"])->name('article.accept');
          Route::get('/{id}', [App\Http\Controllers\Api\ApiArticleController::class, "show"])->name('article.show');
          // Comment
          Route::post('/{id}/comment', [App\Http\Controllers\Api\ApiCommentController::class, "store"])->name('comment.store');
          Route::get('/{id}/comment', [App\Http\Controllers\Api\ApiCommentController::class, "index"])->name('comment.index');
});

Route::post('search', [App\Http\Controllers\Api\ApiArticleController::class, "search"])->name('article.search');

Route::prefix("category")->group(function () {
          Route::get('/', [App\Http\Controllers\Api\ApiCategoryController::class, "index"])->name('category.index');
          Route::get('/{id}', [App\Http\Controllers\Api\ApiCategoryController::class, "show"])->name('category.show');
});

Route::prefix("report")->group(function () {
          Route::post("/add", [App\Http\Controllers\Api\ApiReportController::class, "store"])->middleware(["api"])->name('report.store');
});

Route::prefix("rating")->group(function () {
          Route::post("/add", [App\Http\Controllers\Api\ApiRatingController::class, "store"])->middleware(["api"])->name('rating.store');
          Route::get("{id}/get", [App\Http\Controllers\Api\ApiRatingController::class, "show"])->middleware(["api"])->name('rating.show');
});
