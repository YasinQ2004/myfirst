<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovelController;
use App\Models\Book;

Route::get('/', function () {
        $books = Book::all();
    return view('welcome', compact('books'));
});


Route::get('/book',[NovelController::class,'index'])
        ->name('book.index');


Route::get('/chapters',[NovelController::class,'chapers'])
        ->name('book.chapters');

Route::get('/book/list',[NovelController::class,'ListBooks'])
        ->name('book.list');

Route::get('/book',[NovelController::class,'index'])
        ->name('book.index');

Route::get('/book/create',[NovelController::class,'create'])
        ->name('book.create');

Route::post('/book/store',[NovelController::class,'store'])
        ->name('book.store');

// In web.php (routes)
Route::get('/book/{id}', [NovelController::class, 'show'])
        ->name('book.showchap');


Route::post('/book/{id}/chapters',[NovelController::class,'storeChapter'])
        ->name('book.store-chapter');

Route::get('/book/details/{id}',[NovelController::class,'details'])
        ->name('book.details');

Route::get('/book/edit/{id}',[NovelController::class,'edit'])
        ->name('book.edit');

Route::get('/book/addchapter/{id}',[NovelController::class,'addChapter'])
        ->name('book.addChapter');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

