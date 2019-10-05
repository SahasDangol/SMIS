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
    Route::resource('departments','DepartmentController')->except('show','create');
    Route::post('departments/quick','DepartmentController@quick');

    Route::resource('designations','DesignationController')->except('show','create');
    Route::post('designations/quick','DesignationController@quick');
    Route::resource('testimonial','TestimonialController');
});