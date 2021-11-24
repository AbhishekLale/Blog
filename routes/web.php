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




Route::get('/', function () {
    return view('welcome');
});
 
Auth::routes();

Route::get('/home', [App\Http\Controllers\postcontroller::class, 'allpost'])->name('home');

Route::middleware('auth')->prefix('post')->group( function() {
Route::get('getAll',[App\Http\Controllers\postcontroller::class, 'getAll']);
Route::get('/create', [App\Http\Controllers\postcontroller::class, 'index'])->name('post.create');
Route::post('/store', [App\Http\Controllers\postcontroller::class, 'store'])->name('post.store');
Route::get('/myposts', [App\Http\Controllers\postcontroller::class, 'myposts'])->name('post.myposts');
Route::get('/delete/{post_id}', [App\Http\Controllers\postcontroller::class, 'delete'])->name('post.delete');
Route::get('/edit/{post_id}', [App\Http\Controllers\postcontroller::class, 'edit'])->name('post.edit');
Route::post('/update/{post_id}', [App\Http\Controllers\postcontroller::class, 'update'])->name('post.update');
Route::get('/get/{id}', [App\Http\Controllers\postcontroller::class, 'get'])->name('post.single');
});
Route::post('post/comment/{id}', [App\Http\Controllers\commentcontroller::class, 'store'])->name('comment.store');