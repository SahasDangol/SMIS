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
    Route::resource('classrooms','ClassroomController')->except('create','show');

    Route::post('classrooms/quick','ClassroomController@quick');

    Route::resource('sections','SectionController');
    Route::post('getsection','SectionController@getSection')->name('getSection');
    Route::get('assign_class_teacher','SectionController@assignClassTeacher')->name('section.assignClassTeacher');
    Route::post('store_class_teacher','SectionController@storeClassTeacher')->name('section.storeClassTeacher');
    Route::post('get_unassigned_section','SectionController@getUnassignedSection')->name('section.unassigned');

});


