<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use  App\Http\Controllers\PostControl;
use  App\Http\Controllers\CategoryControl;
use App\Http\Controllers\AuthController;

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
// Todo: Get all posts
Route::get('/posts', [PostControl::class,'index']);

// Todo: Get single post
Route::get('/post/{id}', [PostControl::class,'show']);

// Todo: Get post by category
Route::get('/category/{cat}', [PostControl::class,'findByCat']);

// Todo: Get all Categories
Route::get('/categories', [CategoryControl::class,'index']);

// Todo: Create new user
Route::post('/register', [AuthController::class,'register']);

// Todo: Login user
Route::post('/login', [AuthController::class, 'login']);




/* Product Route */
Route::group(['middleware' => ['auth:sanctum']], function () {

// Todo: Store Post data
    Route::post('/post', [PostControl::class,'store']);

// Todo: Update post data
    Route::post('/post/{id}', [PostControl::class,'update']);

// Todo: Delete post data
    Route::delete('/post/{id}', [PostControl::class,'destroy']);

// Todo: Logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});


