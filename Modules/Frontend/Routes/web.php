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

use Modules\Notice\Entities\Notice;

//Route::resource('frontend', 'FrontendController')->except('show');
Route::prefix('frontend')->group(function () {
    Route::get('/', 'FrontendController@index')->name('frontend.index');
    Route::get('/notices', 'FrontendController@notices')->name('frontend.notices');
    Route::get('/events', 'FrontendController@events')->name('frontend.events');
    Route::get('/about/{id}', 'FrontendController@about')->name('frontend.about');
    Route::get('/notice/{id}', 'FrontendController@single_notice')->name('frontend.single_notice');
    Route::get('gallery', 'FrontendController@gallery');
    Route::get('gallery/{id}', 'FrontendController@showAlbum');

    Route::get('contact_us', function () {
        return view('frontend::contact_us');
    })->name('frontend.contact_us');
    Route::get('faq', function () {
        return view('frontend::faq');
    })->name('frontend.faq');
});
