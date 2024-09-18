<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::prefix('book')->group(function () {
        Route::get('/register', [App\Http\Controllers\BookController::class, 'index'])->name('book.register');
        Route::post('/add', [App\Http\Controllers\BookController::class, 'add'])->name('book.add');
        Route::delete('/destroy/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('book.destroy');
    });

    // メモ登録画面
    Route::prefix('note')->group(function () {
        Route::get('/register/{id}', [App\Http\Controllers\NoteController::class, 'register'])->name('note.register');
        Route::post('/add/{id}', [App\Http\Controllers\NoteController::class, 'add'])->name('note.add');
        Route::put('/edit/{id}', [App\Http\Controllers\NoteController::class, 'noteEdit'])->name('note.edit');
        Route::delete('/destroy/{id}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('note.destroy');
    });


    // 編集画面
    Route::prefix('allNote')->group(function () {
        Route::get('/', [App\Http\Controllers\NoteController::class, 'allNote'])->name('note.allNote');
        Route::put('/edit/{id}', [App\Http\Controllers\NoteController::class, 'allNoteEdit'])->name('allNote.edit');
        Route::get('/search', [App\Http\Controllers\NoteController::class, 'search'])->name('allNote.search');
        Route::delete('/destroy/{id}', [App\Http\Controllers\NoteController::class, 'allNoteDestroy'])->name('allNote.destroy');
    });


    // スライド画面
    Route::get('/slider', [App\Http\Controllers\NoteController::class, 'slider'])->name('slider');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
