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

Route::get('/',[App\Http\Controllers\HomeUserController::class, 'index'])->name('welcome');
Route::post('/search', [App\Http\Controllers\HomeUserController::class, 'search'])->name('search-documents-index');

Auth::routes();

// Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Categorys */
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('categorys');
Route::get('/category/register', [App\Http\Controllers\CategoryController::class, 'create'])->name('create-category');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('register-category');


/* Documents */
Route::get('/documents', [App\Http\Controllers\Documents\DocumentsController::class, 'index'])->name('documents');
Route::get('/documents/register', [App\Http\Controllers\Documents\DocumentsController::class, 'create'])->name('create-document');
Route::post('/documents', [App\Http\Controllers\Documents\DocumentsController::class, 'store'])->name('register-document');
Route::get('/documents/{id}/edit/', [App\Http\Controllers\Documents\DocumentsController::class, 'edit'])->name('edit-document');
Route::delete('/documents/{id}', [App\Http\Controllers\Documents\DocumentsController::class, 'destroy'])->name('delete-document');
Route::post('/documents/search', [App\Http\Controllers\Documents\DocumentsController::class, 'search'])->name('search-documents');
Route::put('/documents/{id}/update', [App\Http\Controllers\Documents\DocumentsController::class, 'update'])->name('update-document');

/* Covers */
Route::get('{id}/cover', [App\Http\Controllers\Documents\CoverDocumentController::class, 'showByDocument'])->name('show-cover');




