<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name("index");

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('/complient', 'ComplientController');
Route::post('/complient/status_create', 'ComplientController@status_create');
Route::resource('/user', 'UserController');
Route::resource('/maper', 'MaperController');
Route::get('/reports', 'ReportsController@index');
Route::get('/reports/monthly_report', 'ReportsController@monthly_report');
