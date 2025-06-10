<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;

Route::resource('/category',CategoryController::class)->middleware('auth');
Route::get('/',[MovieController::class,'index'])->name('movie.index');
Route::get('/movie',[MovieController::class,'create'])->name('movie.create')->middleware('auth',RoleAdmin::class);
Route::post('/movie',[MovieController::class,'add'])->name('movie.add')->middleware('auth');
Route::get('/movie/{id}/{slug}',[MovieController::class,'detail']);

Route::get('/login',[AuthController::class,'loginForm'])->name('login');
Route::post('/login',[AuthController::class,'login']);

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

