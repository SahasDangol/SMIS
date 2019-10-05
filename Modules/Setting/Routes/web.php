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
    Route::resource('setting','SettingController')->except('edit','update');
    Route::get('/settings/edit', 'SettingController@edit');
    Route::put('/setting/update', 'SettingController@update')->name('setting.update');

    Route::resource('academics_year','AcademicsYearController')->only('index','store');
//    Route::post('change_session','AcademicsYearController@change_session');
    Route::get('change_session/{session_id}', 'AcademicsYearController@change_session');

    Route::get('database_backup', 'DatabaseBackupController@backup_database');//whole database backup

    Route::post('/save', 'SettingController@data_color');
    Route::post('/save1', 'SettingController@data_background_color');
    Route::post('/save2', 'SettingController@background_image');

    Route::post('/refresh_graph', 'SettingController@refresh_graph');

    Route::resource('faq','FAQController');

    Route::resource('content','ContentController');
});

Route::get('/installation', 'Install\InstallController@index');

Route::get('install/database', 'Install\InstallController@database');
Route::post('install/process_install', 'Install\InstallController@process_install');
Route::get('install/create_user', 'Install\InstallController@create_user');
Route::post('install/store_user', 'Install\InstallController@store_user');
Route::get('install/system_settings', 'Install\InstallController@system_settings');
Route::post('install/finish', 'Install\InstallController@final_touch');
