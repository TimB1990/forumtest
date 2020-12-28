<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ModeratorController;

Route::get('/', function () {
    return view('layouts.app');
});

// user routes - public
Route::get('auth/login', [UserController::class, 'login']);
Route::post('auth/register', [UserController::class, 'register']);
Route::post('auth/logout', [UserController::class, 'logout']);

// model routes - index - public
Route::get('api/forums', [ForumController::class, 'index']);
Route::get('api/threads', [ThreadController::class, 'index']);
Route::get('api/posts', [PostController::class, 'index']);
Route::get('api/moderators', [ModeratorController::class, 'index']);
Route::get('api/tags', [TagController::class, 'index']);
Route::get('api/users', [UserController::class, 'index']);

// model routes - show - public
Route::get('api/forums/:id', [ForumController::class, 'show']);
Route::get('api/threads/:id', [ThreadController::class, 'show']);
Route::get('api/users/:id', [UserController::class, 'show']);

Route::middleware('auth:sanctum')->group(function(){

    // api - get user requests
    Route::get('api/user', function(Request $request){
        $user = $request->user();
        return response()->json($user);
    });


    // api - post requests
    Route::post('api/forums', [ForumController::class, 'store']);
    Route::post('api/threads', [ThreadController::class, 'store']);
    Route::post('api/posts', [PostController::class, 'store']);
    Route::post('api/moderators', [ModeratorController::class, 'store']);
    Route::post('api/tags', [TagController::class, 'store']);

    // api - update requests
    Route::put('api/forums/:id', [ForumController::class, 'update']);
    Route::put('api/threads/:id', [ThreadController::class, 'update']);
    Route::put('api/posts/:id', [PostController::class, 'update']);
    Route::put('api/moderators/:id', [ModeratorController::class, 'update']);
    Route::put('api/tags/:id', [TagController::class, 'update']);
    Route::put('api/users/:id', [UserController::class, 'update']);

    // api - (soft) delete requests
    Route::patch('api/forums/:id', [ForumController::class, 'delete']);
    Route::patch('api/threads/:id', [ThreadController::class, 'delete']);
    Route::patch('api/posts/:id', [PostController::class, 'delete']);
    Route::patch('api/moderators/:id', [ModeratorController::class, 'delete']);
    Route::patch('api/tags/:id', [TagController::class, 'delete']);
    Route::patch('api/users/:id', [UserController::class, 'delete']);

    // api - destory requests
    Route::delete('api/forums/:id', [ForumController::class, 'destroy']);
    Route::delete('api/threads/:id', [ThreadController::class, 'destroy']);
    Route::delete('api/posts/:id', [PostController::class, 'destroy']);
    Route::delete('api/moderators/:id', [ModeratorController::class, 'destroy']);
    Route::delete('api/tags/:id', [TagController::class, 'destroy']);
    Route::delete('api/users/:id', [UserController::class, 'destory']);

});
