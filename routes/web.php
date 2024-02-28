<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;    


Route::get('/viewCreateUser', [UserController::class, 'viewCreateUser'])->name('viewCreateUser');
Route::post('/createuser', [UserController::class, 'register'])->name('createUser');


Route::get('/',[UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('signin');
// Route::get('/books/index', [])->middleware('auth');

Route::get('/book/index', [BookController::class, 'index'])->name('book.index');