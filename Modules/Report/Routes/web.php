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

Route::group(['prefix' => 'report'], function () {


    Route::group(['middleware' => ['auth']], function () {


        Route::match(['get', 'post'], '/classroom', 'ClassroomReportController@report');


        Route::get('/guardian', 'ReportController@guardianindex');
        Route::get('/guardian/profile/{id}', 'ReportController@guardianprofile');

        Route::match(['get', 'post'], '/classroutine', 'ReportController@classroutineindex');

        Route::match(['get', 'post'], '/examroutine', 'ReportController@examroutineindex');

        Route::match(['get', 'post'], '/students', 'ReportController@studentreport');

        Route::match(['get', 'post'], '/student/attendance/{view?}', 'ReportController@studentattendance');

        Route::get('/transportation', 'ReportController@transportationreport');
        Route::get('/transportation/profile/{id}', 'ReportController@transportationprofile');

        Route::match(['get', 'post'], '/transaction', 'ReportController@transaction_report');

        Route::match(['get', 'post'], '/fee', 'ReportController@fee_report');

        Route::match(['get', 'post'], '/payment_history', 'PaymentHistoryController@report');

        Route::match(['get', 'post'], '/bank', 'BankController@report');


        Route::get('/parent', 'ParentController@index');
        Route::get('/parent/profile/{id}', function ($id) {
            $parent = Student::select('id','first_name', 'middle_name', 'last_name', 'father_first_name', 'father_middle_name', 'father_last_name', 'father_phone', 'father_mobile', 'father_occupation', 'father_photo',
                'status', 'mother_first_name', 'mother_middle_name', 'mother_last_name', 'mother_phone', 'mother_mobile', 'mother_occupation', 'mother_photo')->find($id);

            return view('report::parents.profile', compact('parent'));
        }

        );

    });


});

