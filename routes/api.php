<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BookController;
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

Route::get('/books', [ApiController::class, 'index']);
Route::post('/books', [ApiController::class, 'store']);
Route::get('/show/{id}', [ApiController::class, 'show']);
Route::put('/update/{id}', [ApiController::class, 'update']);
Route::delete('/delete/{id}', [ApiController::class, 'delete']);
// Route::get('/books', [ApiController::class, 'index']);
// Route::get('/books', [ApiController::class, 'index']);
