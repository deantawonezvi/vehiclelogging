<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * DRIVERS API
 * */
Route::post('/driver/add', 'DriverController@addDriver');
Route::post('/driver/update', 'DriverController@updateDriver');
Route::post('/driver/delete', 'DriverController@deleteDriver');
Route::get('/driver/get', 'DriverController@getDriver');

/*
 * CRANES API
 * */
Route::post('/crane/add', 'CraneController@addCrane');
Route::post('/crane/update', 'CraneController@updateCrane');
Route::post('/crane/delete', 'CraneController@deleteCrane');
Route::get('/crane/get', 'CraneController@getCrane');

/*
 * DEFECTS API
 * */
Route::post('/defect/add', 'DefectController@addDefect');
Route::post('/defect/update', 'DefectController@updateDefect');
Route::post('/defect/delete', 'DefectController@deleteDefect');
Route::get('/defect/get', 'DefectController@getDefect');

/*
 * CLIENTS API
 * */
Route::post('/client/add', 'ClientController@addClient');
Route::post('/client/update', 'ClientController@updateClient');
Route::post('/client/delete', 'ClientController@deleteClient');
Route::get('/client/get', 'ClientController@getClient');

/*
 * GARAGES API
 * */
Route::post('/garage/add', 'GarageController@addGarage');
Route::post('/garage/update', 'GarageController@updateGarage');
Route::post('/garage/delete', 'GarageController@deleteGarage');
Route::get('/garage/get', 'GarageController@getGarage');

/*
 * REPAIRS API
 * */
Route::post('/repair/add', 'RepairController@addRepair');
Route::post('/repair/update', 'RepairController@updateRepair');
Route::post('/repair/delete', 'RepairController@deleteRepair');
Route::get('/repair/get', 'RepairController@getRepair');

