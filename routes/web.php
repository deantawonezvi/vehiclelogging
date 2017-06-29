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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/cranes', 'ViewsController@viewCranes')->name('crane_home');
Route::get('/drivers', 'ViewsController@viewDrivers')->name('driver_home');
Route::get('/jobs', 'ViewsController@viewJobs')->name('jobs_home');
Route::get('/reports', 'ViewsController@viewReports')->name('reports_home');
Route::get('/settings', 'ViewsController@viewSettings')->name('settings_home');
Route::get('/clients', 'ViewsController@viewClients')->name('settings_home');


Route::get('/api/driver/add', 'DriverController@addDriver');


