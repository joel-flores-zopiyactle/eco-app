<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Categorys */
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('categorys');
Route::get('/category/register', [App\Http\Controllers\CategoryController::class, 'create'])->name('create-category');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('register-category');


/* Documents */
Route::get('/documents', [App\Http\Controllers\Documents\DocumentsController::class, 'index'])->name('documents');
Route::get('/documents/register', [App\Http\Controllers\Documents\DocumentsController::class, 'create'])->name('create-document');
Route::post('/documents', [App\Http\Controllers\Documents\DocumentsController::class, 'store'])->name('register-document');
Route::delete('/documents/{id}', [App\Http\Controllers\Documents\DocumentsController::class, 'destroy'])->name('delete-document');

