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
    Route::get('indexpagination', 'App\Http\Controllers\BookController@indexpagination')->name('book.indexpagination');
    Route::get('indexsortfilter', 'App\Http\Controllers\BookController@indexsortfilter')->name('book.indexsortfilter');
    Route::get('indexsortable', 'App\Http\Controllers\BookController@indexsortable')->name('book.indexsortable');
    Route::get('indexadvancedsort', 'App\Http\Controllers\BookController@indexadvancedsort')->name('book.indexadvancedsort');

    // Route::get('search', 'App\Http\Controllers\AuthorController@search')->name('author.search');

});

Route::prefix('ratings')->group(function() {
    Route::get('', 'App\Http\Controllers\RatingController@index')->name('rating.index');
    Route::get('create', 'App\Http\Controllers\RatingController@create')->name('rating.create');
    Route::post('store', 'App\Http\Controllers\RatingController@store')->name('rating.store');

});