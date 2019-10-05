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
    Route::match(['get','post'],'students/attendance','StudentAttendanceController@student_attendance')->name('student_attendance.create');
    Route::post('students/attendance/fetch','StudentAttendanceController@fetch')->name('fetch');
    Route::post('students/attendance/update','StudentAttendanceController@update');
    Route::get('staff/attendance/create','StaffAttendanceController@create');
    Route::post('staff/attendance/store','StaffAttendanceController@store');
});
