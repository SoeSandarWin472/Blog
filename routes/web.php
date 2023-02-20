<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Models\User;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);

Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware(
    'guest'
);
Route::post('/blogs/{blog:slug}/subscription', [
    BlogController::class,
    'subscriptionHandler',
]);
//admin route

Route::get('/admin/blogs/create', [
    BlogController::class,
    'create',
])->middleware('admin');
