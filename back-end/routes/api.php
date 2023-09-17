<?php

use App\Http\Controllers\Api\ApiArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
          return $request->user();
});

Route::get('article/', [App\Http\Controllers\Api\ApiArticleController::class, "index"])->name('article.index');
Route::get('article/{id}', [App\Http\Controllers\Api\ApiCommentController::class, "show"]);
Route::group(['middleware' => 'jwt.auth'], function () {
          Route::get('user-info', 'UserController@getUserInfo');
});
