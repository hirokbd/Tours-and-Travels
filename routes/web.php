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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

Route::group(['prefix' => 'location'], function() {
    Route::get('/', 'LocationController@index');
    Route::post('/store', 'LocationController@store')->name('location.store');
    Route::get('/{id}/subdelete', 'LocationController@sub_delete')->name('subloc.delete');
    Route::get('/{id}/delete', 'LocationController@delete')->name('location.delete');
});

Route::group(['prefix' => 'agent'], function() {
    Route::get('/', 'AgentController@index');
    Route::get('/add', 'AgentController@add');
    Route::post('/store', 'AgentController@store')->name('agent.store');
    Route::get('/{id}/edit', 'AgentController@edit')->name('agent.edit');
    Route::post('/{id}/update', 'AgentController@update')->name('agent.update');
    Route::get('/{id}/delete', 'AgentController@delete')->name('agent.delete');
    Route::get('/get-sub-location','AgentController@getSubLocation');
});

Route::group(['prefix' => 'passenger'], function() {
    Route::get('/', 'ClientController@index');
    Route::get('/add', 'ClientController@add');
    Route::post('/store', 'ClientController@store')->name('passenger.store');
    Route::get('/{id}/edit', 'ClientController@edit')->name('passenger.edit');
    Route::post('/{id}/update', 'ClientController@update')->name('passenger.update');
    Route::get('/{id}/delete', 'ClientController@delete')->name('passenger.delete');
    Route::get('/{id}/view', 'ClientController@view')->name('passenger.view');
    Route::get('/get-sub-location','ClientController@getSubLocation');
});


Route::group(['prefix' => 'invoice'], function() {
    Route::get('/', 'InvoiceController@index');
    Route::get('/add', 'InvoiceController@add');
    Route::post('/store', 'InvoiceController@store')->name('invoice.store');
    Route::get('/{id}/edit', 'InvoiceController@edit')->name('invoice.edit');
    Route::post('/{id}/update', 'InvoiceController@update')->name('invoice.update');
    Route::get('/{id}/delete', 'InvoiceController@delete')->name('invoice.delete');
    Route::get('/unitPrice','InvoiceController@unitPrice');
    Route::get('/agentID','InvoiceController@agentID');
    Route::get('/clientID','InvoiceController@clientID');
    Route::get('/{id}/view', 'InvoiceController@show')->name('invoice.view');
});

Route::group(['prefix' => 'settings'], function() {
    Route::get('/', 'SettingController@index');
    Route::get('/{id}/edit', 'SettingController@edit')->name('setting.edit');
    Route::post('/{id}/update', 'SettingController@update')->name('setting.update');

    Route::get('/visa-type', 'VisaTypeController@index');
    Route::post('/visa-type/store', 'VisaTypeController@store')->name('visa-type.store');
    Route::get('/visa-type/{id}/delete', 'VisaTypeController@delete')->name('visa-type.delete');

    Route::get('/country', 'CountryController@index');
    Route::post('/country/store', 'CountryController@store')->name('country.store');
    Route::get('/country/{id}/delete', 'CountryController@delete')->name('country.delete');

    Route::get('/currency-type', 'PaymentTypeController@index');
    Route::post('/currency-type/store', 'PaymentTypeController@store')->name('currency-type.store');
    Route::get('/currency-type/{id}/delete', 'PaymentTypeController@delete')->name('currency-type.delete');

    Route::get('/exname', 'ExpenseNameController@index');
    Route::post('/exname/store', 'ExpenseNameController@store')->name('exname.store');
    Route::get('/exname/{id}/delete', 'ExpenseNameController@delete')->name('exname.delete');
});

Route::group(['prefix' => 'visa'], function() {
    Route::get('/', 'VisaController@index');
    Route::get('/add', 'VisaController@add');
    Route::post('/store', 'VisaController@store')->name('visa.store');
    Route::get('/{id}/edit', 'VisaController@edit')->name('visa.edit');
    Route::post('/{id}/update', 'VisaController@update')->name('visa.update');
    Route::get('/{id}/delete', 'VisaController@delete')->name('visa.delete');
});

Route::group(['prefix' => 'package'], function() {
    Route::get('/', 'PackageController@index');
    Route::post('/store', 'PackageController@store')->name('package.store');
    Route::get('/{id}/delete', 'PackageController@delete')->name('package.delete');
});

Route::group(['prefix' => 'bank'], function() {
    Route::get('/', 'BankController@index');
    Route::get('/add', 'BankController@add');
    Route::post('/store', 'BankController@store')->name('bank.store');
    Route::get('/{id}/edit', 'BankController@edit')->name('bank.edit');
    Route::post('/{id}/update', 'BankController@update')->name('bank.update');
    Route::get('/{id}/delete', 'BankController@delete')->name('bank.delete');
});


Route::group(['prefix' => 'accounts'], function() {
    Route::get('/', 'AccountsController@index');
    Route::post('/profitSearch', 'AccountsController@incomeSearch')->name('search.incomeSearch');

    Route::get('/expense', 'ExpenseController@index');
    Route::get('/expense/add', 'ExpenseController@add');
    Route::post('/expense/store', 'ExpenseController@store')->name('expense.store');
    Route::get('/{id}/expense/delete', 'ExpenseController@delete')->name('expense.delete');
});


Route::group(['prefix' => 'office'], function() {
    Route::get('/', 'ForeignOfficeController@index');
    Route::get('/add', 'ForeignOfficeController@add');
    Route::post('/store', 'ForeignOfficeController@store')->name('office.store');
    Route::get('/{id}/edit', 'ForeignOfficeController@edit')->name('office.edit');
    Route::post('/{id}/update', 'ForeignOfficeController@update')->name('office.update');
    Route::get('/{id}/delete', 'ForeignOfficeController@delete')->name('office.delete');

    Route::get('/remittance', 'RemittanceController@index');
    Route::post('/remittance/store', 'RemittanceController@store')->name('remittance.store');
    Route::get('/remittance/{id}/delete', 'RemittanceController@delete')->name('remittance.delete');
});