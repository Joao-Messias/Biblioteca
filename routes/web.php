<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Book\BookController;
use \App\Http\Controllers\Clients\ClientsController;
use \App\Http\Controllers\Loans\LoansController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('books/{q?}', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/register', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/register', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/edit/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/delete/{book}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
    Route::post('/clients/create', [ClientsController::class, 'store'])->name('clients.store');
    Route::get('/clients/edit/{client}', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/edit/{client}', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('/clients/delete/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');
    Route::get('/loans', [LoansController::class, 'index'])->name('loans.index');
    Route::get('/loans/create', [LoansController::class, 'create'])->name('loans.create');
    Route::post('/loans/create', [LoansController::class, 'store'])->name('loans.store');
    Route::put('/loans/return/{loan}', [LoansController::class, 'return'])->name('loans.return');
});

require __DIR__ . '/auth.php';
