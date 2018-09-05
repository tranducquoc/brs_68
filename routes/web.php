<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('books', 'BookController');
Route::resource('comments', 'CommentController');
Route::get('/search', 'HomeController@searchBook')->name('search');
Route::resource('requests', 'RequestbookController');

Route::namespace('Admin')->group(function() {
  Route::get('/admin', 'StaticPageController@index')->middleware('is_admin')->name('admin');
  Route::resource('requestbooks', 'RequestbookController');
});
