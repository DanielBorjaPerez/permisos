<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\roleController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/books/create', [BookController::class,'createBook'])->name('create');

Route::get('/books/{id}', [BookController::class,'showBook'])
        ->where('id', '[0-9]+')
        ->name('show');

Route::post('/books/create', [BookController::class,'addBook'])->name('add');

Route::get('/books/{book}/borrar', [BookController::class,'deleteBook'])->name('delete');
Route::get('/books/{book}/editar', [BookController::class,'editBook'])->name('edit');
Route::post('/books/{id}/editar', [BookController::class,'modifyBook'])->name('modify');


