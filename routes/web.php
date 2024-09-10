<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ModalController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/book/register', [App\Http\Controllers\BookController::class, 'index'])->name('book.register');
Route::post('/book/add', [App\Http\Controllers\BookController::class, 'add'])->name('book.add');


Route::get('/note', [App\Http\Controllers\NoteController::class, 'index'])->name('note.index');
Route::get('/note/register/{id}', [App\Http\Controllers\NoteController::class, 'register'])->name('note.register');
Route::get('/note/edit', [App\Http\Controllers\NoteController::class, 'note.edit'])->name('note.edit');
Route::post('/note/add/{id}', [App\Http\Controllers\NoteController::class, 'add'])->name('note.add');
Route::delete('/note/destroy/{id}', [App\Http\Controllers\NoteController::class, 'destroy'])->name('note.destroy');


Route::get('/allNote', [App\Http\Controllers\NoteController::class, 'allNote'])->name('note.allNote');
Route::delete('/allNote/destroy/{id}', [App\Http\Controllers\NoteController::class, 'allNoteDestroy'])->name('allNote.destroy');

Route::get('/modal', [ModalController::class, 'modal']);


Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
