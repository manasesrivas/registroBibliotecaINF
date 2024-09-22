<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReaderController;
use App\Models\Loan;
use App\Models\Reader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//

Route::get('/', function():RedirectResponse{
    return redirect()->route("book.index");
}); 

// book

Route::get('/books/index', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/update/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/destroy/{book}', [BookController::class, 'destroy'])->name('book.destroy');

// reader

Route::get('/readers/index/{id?}', [ReaderController::class, 'index'])->name('reader.index');
Route::get('/readers/create', [ReaderController::class, 'create'])->name('reader.create');
Route::post('/readers/store', [ReaderController::class, 'store'])->name('reader.store');
Route::get('/readers/edit/{reader}', [ReaderController::class, 'edit'])->name('reader.edit');
Route::put('/readers/update/{reader}', [ReaderController::class, 'update'])->name('reader.update');
Route::delete('/readers/destroy/{reader}', [ReaderController::class, 'destroy'])->name('reader.destroy');


Route::get("/loans/index", [LoanController::class, 'index'])->name("loan.index");
Route::get("/loans/edit/{loan}", [LoanController::class, 'edit'])->name("loan.edit");
Route::post("/loans/store", [LoanController::class, 'store'])->name("loan.store");
Route::get("/loans/loanComeBack/{id}", [LoanController::class, 'loanComeBack'])->name("loan.loanComeBack");
// terminar modelo de loan porque no esta creado


