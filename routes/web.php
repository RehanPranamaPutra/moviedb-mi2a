<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;

Route::resource('/category', CategoryController::class)->middleware('auth');
Route::get('/', [MovieController::class, 'index'])->name('movie.index');
Route::get('/movie', [MovieController::class, 'create'])->name('movie.create')->middleware('auth', RoleAdmin::class);
Route::post('/movie', [MovieController::class, 'add'])->name('movie.add')->middleware('auth');
Route::get('/movie/data', [MovieController::class, 'data'])->name('movie.data');

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail']);
Route::get('/movie/{movie}', [MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movie/{movie}', [MovieController::class, 'update'])->name('movie.update')->middleware('auth', RoleAdmin::class);
Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy')->middleware('auth', RoleAdmin::class);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
