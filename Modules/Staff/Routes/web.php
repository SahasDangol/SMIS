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
    Route::resource('staff','StaffController')->except('staff.destroy');
Route::delete('staff/{id}','StaffController@destroy');
    Route::get('hr/export', 'StaffController@export');
    Route::get('hr/import', 'StaffController@import_view');
    Route::post('hr/import', 'StaffController@import');
    Route::get('hr/download', 'StaffController@download_format');
    Route::get('staff/activation/{token}','StaffController@userActivation');
    Route::get('/mailactivation',function(){
        return view('staff::staff.mail.activation');
    });
//ROute::post('staffs/register','StaffController@register');

});

