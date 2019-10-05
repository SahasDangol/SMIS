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

use Modules\Student\Entities\Student;
use Modules\StudentFee\Entities\Invoice;
use Modules\StudentFee\Entities\InvoiceItem;
use Modules\StudentFee\Entities\StudentPayment;

Route::group(['middleware' => ['install','auth']], function () {
    Route::resource('student', 'StudentController');
    Route::resource('guardian','GuardianController');
    Route::post('guardian/quick','GuardianController@quick');
    Route::get('students/history', 'StudentController@history');
    //Student Export
    Route::get('students/export', 'StudentController@export');
    //Student Export

    //Student Import
    Route::get('students/import', 'StudentController@import_view');
    Route::post('students/import', 'StudentController@import');
    Route::get('students/download', 'StudentController@download_format');
    //Student Import

    //Student Promotion to Next Class
    Route::match(['get', 'post'], 'students/promote/{step?}', 'StudentController@promote');
    //Student Promotion to Next Class

    Route::post('get_student', 'StudentController@getStudent');
    Route::post('get_invoice_student', 'StudentController@getInvoiceStudent');

    //Guardian Import
    Route::get('guardians/import', 'GuardianController@import_view');

    Route::post('guardians/import', 'GuardianController@import');

    Route::match(['get', 'post'], 'student/custom', 'StudentController@getCustomFilterData');

    Route::match(['get','post'],'students/swap_sections','SectionSwapController@section_swap')->name('student.section_swap');
    Route::post('swap_sections_store','SectionSwapController@section_swap_store')->name('student.section_swap_store');

    Route::match(['get','post'],'students/manage_roll_no','ManageRollController@section_choose')->name('student.Manage_roll_no');
    Route::post('manage_roll_no_store','ManageRollController@manage_roll_no_store');
});
