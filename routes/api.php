<?php

use App\Http\Controllers\PostCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Post\PonstController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('posts', PonstController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('postComment', PostCommentController::class);
