<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::resource('/category',CategoryController::class);
Route::get('/',[MovieController::class,'index'])->name('movie.index');
Route::get('/movie/create',[MovieController::class,'create'])->name('movie.create');
Route::post('/movie/add',[MovieController::class,'add'])->name('movie.add');
