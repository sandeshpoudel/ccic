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
    return redirect('/login');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['prefix' => 'staff', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'StaffController@index');
    // get members from this membership status
    Route::get('membershipstatuses/{membershipstatus}/members ', 'MembershipstatusesController@members');
    Route::resource('membershipstatuses', 'MembershipstatusesController');
    // get members from this membership type
    Route::get('membershiptypes/{membershiptype}/members', 'MembershiptypesController@members');
    Route::resource('membershiptypes', 'MembershiptypesController');
    //get municipalities
    Route::get('locations/municipalities', 'LocationsController@municipalities');
    //get vdcs
    Route::get('locations/vdcs', 'LocationsController@vdcs');
    //get sub metro city
    Route::get('locations/submetro', 'LocationsController@submetro');
    //get metro
    Route::get('locations/metro', 'LocationsController@metro');
    // get members on this location
    Route::get('locations/{location}/members', 'LocationsController@members');
    Route::resource('locations', 'LocationsController');

    Route::get('events/{event}/export', 'EventsController@export');
    Route::resource('events', 'EventsController');
    // categories
//    Route::get('categories/check','CategoriesController@check');
    Route::get('categories/{category}/members', 'CategoriesController@members');
    Route::resource('categories', 'CategoriesController');

    // export stuff to excel
    Route::get('categories/{category}/export', 'ExportController@fromCategory');
    Route::get('membershiptypes/{membershiptype}/export', 'ExportController@fromMembershiptype');
    Route::get('membershipstatuses/{membershipstatus}/export', 'ExportController@fromMembershipstatus');
    Route::get('locations/{location}/export', 'ExportController@fromLocation');
    Route::get('ownershiptypes/{ownershiptype}/export', 'ExportController@fromOwnershiptype');


    // member related routes
    Route::get('members/filter', 'MembersController@filter');
    Route::get('members/{member}/invoices/create', 'InvoicesController@create');
    Route::get('members/{member}/invoices/newentry', 'InvoicesController@newentry');
    Route::get('members/{member}/invoices/renew', 'InvoicesController@renew');
    Route::get('members/{member}/invoices/calculateamountdue', 'InvoicesController@calculateamountdue');
    Route::get('members/{member}/representatives/create', 'RepresentativesController@create');
    Route::get('members/{member}/nepalidetails', 'NepalidetailsController@index');
    Route::post('members/{member}/nepalidetails', 'NepalidetailsController@store');
    Route::get('members/search', 'MembersController@search');
    Route::get('members/female/all', 'ExportController@fromGender');
    Route::resource('members', 'MembersController');
    // others
    Route::resource('membercontacts', 'MembercontactsController');
    Route::resource('registrations', 'RegistrationsController');
//    Route::resource('registrations', 'RegistrationsController');
    Route::resource('receivables', 'ReceivablesController');
    Route::resource('representatives', 'RepresentativesController');
    Route::resource('nepalidetails', 'NepalidetailsController');

    //ownership type stuffs
    Route::get('ownershiptypes/{ownershiptype}/members ', 'OwnershiptypesController@members');
    Route::resource('ownershiptypes','OwnershiptypesController');

    //  invoice stuffs
    Route::post('invoices/betweendates','InvoicesController@betweendates');
//    Route::post('invoices/betweendatesexport','InvoicesController@betweendatesexport');
    Route::post('invoices/fromid','InvoicesController@fromid');
    Route::get('invoices/{invoice}/dotprint', 'InvoicesController@dotprint');
    Route::resource('invoices','InvoicesController');
    Route::resource('invoiceables','InvoiceablesController');



    // fiscal and fees
    Route::get('fiscals/{fiscal}/fees', 'FeesController@create');
    Route::post('fees', 'FeesController@store');
    Route::get('fiscals/{fiscal}/fines', 'FinesController@create');
    Route::post('fines', 'FinesController@store');
    Route::get('fines/{fine}/edit', 'FinesController@edit');
    Route::patch('fines/{fine}', 'FinesController@update');
    Route::resource('fines', 'FinesController');
    Route::resource('fiscals', 'FiscalsController');

    Route::get('activities', 'ActivitiesController@index');
    Route::get('activities/filter', 'ActivitiesController@filter');
});

Auth::routes();

Route::get('/home', function()
{
    return redirect('/staff/dashboard');
});
