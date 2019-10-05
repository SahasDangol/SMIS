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


    Route::get('/invoice', function () {
        return view('studentfee::invoice');
    })->name('invoice');
    Route::resource('feetypes','FeeTypeController');
    Route::resource('invoices','InvoiceController');



    Route::post('feetypes/quick','FeeTypeController@quick');
    Route::resource('student_payments','StudentPaymentController')->except('show');
    Route::get('student_payments/{id}','StudentPaymentController@show');
    Route::post('get_feetype_amount','FeeTypeController@get_fee_amount');
    Route::post('invoices/set_id','InvoiceController@set_id');
    Route::get('payment/student/roll','StudentPaymentController@search_roll');
    Route::post('payment/student','StudentPaymentController@specific_student');
    Route::post('payment/student/{id}','StudentPaymentController@specific_student_payment');
    Route::post('get_fee_types','FeeTypeController@getFeeTypes')->name('getFeeTypes');
    Route::post('print_invoice','InvoiceController@print_invoice');

});
