<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/crea-libro', [BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::post('/salva', [BookController::class, 'store'])->name('books.store')->middleware('auth');
Route::get('/dettaglio-libro/{book}',  [BookController::class, 'show'])->name('books.show');
Route::get('/modifica-libri/{book}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/aggiorna/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/elimina-libro/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Route::resource('authors', AuthorController::class)->middleware('auth'); // ho generato le 7 rotte di un CRUD


Route::resource('categories', CategoryController::class)->middleware('auth');// ho generato le 7 rotte di un CRUD
