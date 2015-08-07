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

/* Default route set here */
Route::any('/',array('uses' => 'AddressController@index', 'as' => 'home'));	

/* This route used to validate the user given address by calling curl */
Route::any('validate-address',array('uses' => 'AddressController@validateAddress', 'as' => 'validate-address'));

