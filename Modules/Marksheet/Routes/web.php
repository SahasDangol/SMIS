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
    Route::post('marksheet', 'MarksheetController@store');
    Route::match(['get', 'post'], 'marksheet/multipleshow', 'MarksheetController@multipleshow')->name('marksheet.multipleshow');
    Route::get('marksheet/show/{student_id}/{exam_id}', 'MarksheetController@show')->name('marksheet.show');
    Route::match(['get', 'post'], 'marksheet/create', 'MarksheetController@create')->name('marksheet.create');
    Route::match(['get', 'post'], 'marksheet/index', 'MarksheetController@index')->name('marksheet.index');
    Route::match(['get', 'post'], 'overall/marksheet', 'MarksheetController@overall')->name('marksheet.overall');


    Route::match(['get','post'],'marksheet/bulkinsert','MarksheetController@bulkinsert')->name('marksheet.bulkinsert');
    Route::match(['get','post'],'marksheet/export','MarksheetController@export')->name('marksheet.export');
    Route::match(['get','post'],'marksheet/import','MarksheetController@import')->name('marksheet.import');

    Route::get('publish/results', 'ExamResultController@index')->name('publish.results');

});


