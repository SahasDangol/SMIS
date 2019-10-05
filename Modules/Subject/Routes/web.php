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
Route::group(['middleware' => ['install','auth']],function() {
    Route::resource('subject', 'SubjectController');
    Route::resource('subject_assign', 'OptionalSubjectAssignController');

    Route::post('getsubject','SubjectController@getSubject')->name('getSubject');
    Route::match(['get', 'post'],'subject_assign/create','OptionalSubjectAssignController@create')->name('subject_assign.create');

    Route::match(['get', 'post'],'subject_teacher/create','SubjectTeacherController@create');
    Route::resource('subject_teacher','SubjectTeacherController');
});
