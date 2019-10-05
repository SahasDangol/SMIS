<?php


Route::group(['middleware' => ['install']],function() {

//    Auth::routes();
    Auth::routes(['register' => false]);

    Route::get('/', function () {
        return redirect('/frontend');
    });

//    Route::get('/tables', 'SearchController@tables');

//    Route::get('/lockscreen', 'LockscreenController@get');
//
//    Route::post('/lockscreen', 'LockscreenController@post');

    Route::get('/response_error','ErrorController@message');

    Route::group(['middleware' => ['auth']], function () {

        Route::get('/dashboard', 'DashboardController@index');

        Route::get('/profile', function () {
            return view('profile');
        });

        Route::resource('/password/change', 'PasswordChangeController')->only('update');

        Route::get('/import', 'UserController@import');

        Route::get('/export', 'UserController@export');

        Route::resource('permissions', 'PermissionController')->except('create', 'edit', 'show', 'destroy');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController')->except('create', 'show');
        Route::resource('visitors', 'VisitorController');
    });
});
