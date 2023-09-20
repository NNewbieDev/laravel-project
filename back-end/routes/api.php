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

Route::post('/register', [App\Http\Controllers\Api\ApiUserController::class, 'register']);

Route::group([
          'middleware' => 'api',
          'prefix' => 'auth'
], function ($router) {
          Route::get('/user', function () {
                    return auth('api')->user();
          });
          Route::post('/login', [App\Http\Controllers\Api\ApiUserController::class, 'login']);
          Route::post('logout', [App\Http\Controllers\Api\ApiUserController::class, 'logout']);
          Route::post('refresh', [App\Http\Controllers\Api\ApiUserController::class, 'refresh']);
          Route::post('/me', [App\Http\Controllers\Api\ApiUserController::class, 'me']);
});

Route::get('article/', [App\Http\Controllers\Api\ApiArticleController::class, "index"])->name('article.index');
Route::get('article/{id}', [App\Http\Controllers\Api\ApiCommentController::class, "show"]);
// Route::group(['middleware' => 'jwt.auth'], function () {
//           Route::get('user-info', 'UserController@getUserInfo');
// });
