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

Route::group(['middleware' => ['install', 'auth']], function () {
    Route::resource('library', 'LibraryController');
    Route::resource('book', 'BookController');
    Route::match(['get', 'post'], 'book/issue', 'BookController@issuebook');
    Route::match(['get', 'post'], 'book_issue', 'BookController@issue');
    Route::match(['get', 'post'], 'book_return', 'BookController@return');
    Route::match(['get', 'post'], 'book/return', 'BookController@returnbook');
    Route::match(['get', 'post'], 'book/single_issue/{id}', 'BookController@singleissue');
    Route::match(['get', 'post'], 'book/single_return/{id}', 'BookController@singlereturn');
    Route::post('book/submit/{id}', 'BookController@submitbook');
});
