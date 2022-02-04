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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('authors')->group(function() {
    Route::get('', 'App\Http\Controllers\AuthorController@index')->name('author.index');
    Route::get('search', 'App\Http\Controllers\AuthorController@search')->name('author.search');

});

Route::prefix('books')->group(function() {
    Route::get('', 'App\Http\Controllers\BookController@index')->name('book.index');
    Route::get('bookfilter', 'App\Http\Controllers\BookController@bookfilter')->name('book.bookfilter');
    // Route::get('search', 'App\Http\Controllers\AuthorController@search')->name('author.search');

});