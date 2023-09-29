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
          Route::post('update', [App\Http\Controllers\Api\ApiUserController::class, 'update']);
          Route::post('me', [App\Http\Controllers\Api\ApiUserController::class, 'me']);
});
Route::post('article/create', [App\Http\Controllers\Api\ApiArticleController::class, "store"])->middleware(["api", "checkRole:1"])->name('article.store');

Route::get('article/', [App\Http\Controllers\Api\ApiArticleController::class, "index"])->name('article.index');
Route::get('article/{id}', [App\Http\Controllers\Api\ApiArticleController::class, "show"])->name('article.show');
Route::post('article/{id}/accept', [App\Http\Controllers\Api\ApiArticleController::class, "accept"])->middleware(["api", "checkRole:1", "checkRole:2"])->name('article.accept');
Route::post('article/{id}/delete', [App\Http\Controllers\Api\ApiArticleController::class, "destroy"])->middleware(["api", "checkRole:1", "checkRole:2"])->name('article.destroy');

Route::post('search', [App\Http\Controllers\Api\ApiArticleController::class, "search"])->name('article.search');

Route::post('article/{id}/comment', [App\Http\Controllers\Api\ApiCommentController::class, "store"])->name('comment.store');
Route::get('category/', [App\Http\Controllers\Api\ApiCategoryController::class, "index"])->name('category.index');
Route::get('category/{id}', [App\Http\Controllers\Api\ApiCategoryController::class, "show"])->name('category.show');
// Route::group(['middleware' => 'jwt.auth'], function () {
//           Route::get('user-info', 'UserController@getUserInfo');
// });
