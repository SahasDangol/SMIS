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

    Route::resource('fiscal_year','FiscalYearController');

    Route::resource('journals','JournalController');
    Route::post('journals/reconciliation','JournalController@reconciliation');
    Route::post('journals/reconciliation/all','JournalController@reconciliation_unreconciliation');
    Route::post('/journals/specific', 'JournalController@index');
    Route::match(['get','post'],'/journals/view_journal/{id}','JournalController@view_journal');

    Route::resource('ledger','LedgerController');
    Route::match(['get','post'],'ledger/view_ledger/{id}','LedgerController@view_ledger');
    Route::post('ledger/specific','LedgerController@specific');
    Route::post('ledger/quick','LedgerController@quick');
    Route::resource('ledgerlist','ListOfLedgerController');

    Route::match(['get','post'],'/trial_balance','TrialBalanceController@index');

    Route::match(['get','post'],'/daybook','DayBookController@index');

    Route::get('/group','GroupController@index');

    Route::match(['get','post'],'/profit_loss','ProfitLossController@index');

    Route::match(['get','post'],'/balance_sheet','BalanceSheetController@index');

    Route::get('/cashbook','CashBookController@index');

});
