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

Route::group(['middleware' => ['install','auth','web']],function() {
    Route::resource('exams/list','ExamListController')->except('create','show');

    Route::resource('exams/grade','MarkGradeController')->except('create','show');
    Route::post('exams/grade/quick','MarkGradeController@quick');

    Route::resource('exams/routine','ExamRoutineController')->except('create','show');

});
