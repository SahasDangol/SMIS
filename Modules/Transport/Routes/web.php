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
    Route::resource('transports/vehicles','TransportVehicleController')->except('create','show');
    Route::resource('transports/routes','TransportRouteController')->except('create','show');
//    Route::resource('transports/assign','TransportAssignController')->except('create','show');
});
