<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/names', [UserController::class, 'getNames']);
Route::post('/user/create', [UserController::class, 'store']);
Route::get('/user/retrieve/{id}', [UserController::class, 'retrieveUser']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

// Api route for posts

Route::get('/user/posts', [PostController::class, 'index']);
Route::get('/user/posts/{id}', [PostController::class, 'getUserPosts']);
Route::post('/post/add', [PostController::class, 'store']);




 