<?php

use App\Http\Controllers\Admin\BooksController as AdminBooksController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
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

Route::redirect('/', '/books');
//Route::resource('books', BooksController::class);
Route::get('/books', [BooksController::class, 'index'])->name('library');
Route::get('/book/{book}', [BooksController::class, 'show'])->name('library.show');
Route::post('/comment/{book}', [CommentsController::class, 'store'])->name('comment.store');
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function (){
    Route::resource('books', AdminBooksController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('users', UsersController::class);
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
