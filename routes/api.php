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

