<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\Book\BookController;
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
});

require __DIR__.'/auth.php';
