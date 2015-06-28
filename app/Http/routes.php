<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
/**
 * Client controller route protected by auth middleware
 * for user protections only .
 * the client controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('client', 'ClientController@index');
    Route::get('client/create', 'ClientController@create');
    Route::post('client/store', 'ClientController@store');
    Route::get('client/edit', 'ClientController@edit');
    Route::post('client/update', 'ClientController@update');
    Route::get('client/{$id}', 'ClientController@show');

});
/**
 * Owner controller route protected by auth middleware
 * for user protections only .
 * the Owner controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('owner', 'OwnerController@index');
    Route::get('owner/create', 'OwnerController@create');
    Route::post('owner/store', 'OwnerController@store');
    Route::get('owner/edit', 'OwnerController@edit');
    Route::post('owner/update', 'OwnerController@update');
    Route::get('owner/{$id}', 'OwnerController@show');

});
/**
 * RentalAgreement controller route protected by auth middleware
 * for user protections only .
 * the RentalAgreement controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('rentalagreement', 'RentalAgreementController@index');
    Route::get('rentalagreement/create', 'RentalAgreementController@create');
    Route::post('rentalagreement/store', 'RentalAgreementController@store');
    Route::get('rentalagreement/edit', 'RentalAgreementController@edit');
    Route::post('rentalagreement/update', 'RentalAgreementController@update');
    Route::get('rentalagreement/{$id}', 'RentalAgreementController@show');

});

/**
 * Property controller route protected by auth middleware
 * for user protections only .
 * the Property controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('property', 'PropertyController@index');
    Route::get('property/create', 'PropertyController@create');
    Route::post('property/store', 'PropertyController@store');
    Route::get('property/edit', 'PropertyController@edit');
    Route::post('property/update', 'PropertyController@update');
    Route::get('property/{$id}', 'PropertyController@show');

});

/**
 * Property controller route protected by auth middleware
 * for user protections only .
 * the Property controller functions:
 * index,create,store,edit,update,show
 *
 * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('address', 'AddressController@index');
    Route::get('address/create', 'AddressController@create');
    Route::post('address/store', 'AddressController@store');
    Route::get('address/edit', 'AddressController@edit');
    Route::post('address/update', 'AddressController@update');
    Route::get('address/{$id}', 'AddressController@show');

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
