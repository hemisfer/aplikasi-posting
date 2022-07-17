<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/single/{id}', [App\Http\Controllers\WelcomeController::class, 'single'])->name('single');
Route::get('/about', [App\Http\Controllers\WelcomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\WelcomeController::class, 'contact'])->name('contact');
Route::get('/spesifik/{topik}', [App\Http\Controllers\WelcomeController::class, 'spesifik'])->name('spesifik');
Route::get('/recentposts', [App\Http\Controllers\WelcomeController::class, 'recentpost'])->name('recentpost');
Route::get('/archives/{archive}', [App\Http\Controllers\WelcomeController::class, 'archives'])->name('archives');
Route::get('/byauthor/{author}', [App\Http\Controllers\WelcomeController::class, 'byauthor'])->name('byauthor');


Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/add-user', [App\Http\Controllers\UserController::class, 'add'])->name('add-user');
Route::post('/store-user', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');
Route::post('/update-user', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');
Route::get('/delete-user/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete-user');

Route::get('/posting', [App\Http\Controllers\PostingController::class, 'index'])->name('posting');
Route::get('/add-posting', [App\Http\Controllers\PostingController::class, 'add'])->name('add-posting');
Route::post('/store-posting', [App\Http\Controllers\PostingController::class, 'store'])->name('store-posting');
Route::get('/edit-posting/{id}', [App\Http\Controllers\PostingController::class, 'edit'])->name('edit-posting');
Route::post('/update-posting', [App\Http\Controllers\PostingController::class, 'update'])->name('update-posting');
Route::get('/delete-posting/{id}', [App\Http\Controllers\PostingController::class, 'delete'])->name('delete-posting');

Route::get('/konfigurasi', [App\Http\Controllers\FrontController::class, 'index'])->name('konfigurasi');
Route::get('/add-konfigurasi', [App\Http\Controllers\FrontController::class, 'add'])->name('add-konfigurasi');
Route::post('/store-konfigurasi', [App\Http\Controllers\FrontController::class, 'store'])->name('store-konfigurasi');
Route::get('/edit-konfigurasi/{id}', [App\Http\Controllers\FrontController::class, 'edit'])->name('edit-konfigurasi');
Route::post('/update-konfigurasi', [App\Http\Controllers\FrontController::class, 'update'])->name('update-konfigurasi');
Route::get('/delete-konfigurasi/{id}', [App\Http\Controllers\FrontController::class, 'delete'])->name('delete-konfigurasi');


Route::get('/comment', [App\Http\Controllers\CommentController::class, 'index'])->name('comment');
Route::post('/store-comment', [App\Http\Controllers\CommentController::class, 'store'])->name('store-comment');
Route::get('/delete-comment/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('delete-comment');