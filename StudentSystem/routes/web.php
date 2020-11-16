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
    return view('welcome');
});



Route::get('/School', 'App\Http\Controllers\StudentController@createSchool');
Route::get('/Class', 'App\Http\Controllers\StudentController@createClass');
Route::get('/Class', 'App\Http\Controllers\StudentController@all');
Route::get('/Student','App\Http\Controllers\StudentController@createStudent');
Route::get('/Student', 'App\Http\Controllers\StudentController@getClassID');
Route::get('/Update', 'App\Http\Controllers\TableditController@index');
Route::get('/studentSearch', 'App\Http\Controllers\StudentSearchController@index');


Route::post('/tabledit.action','App\Http\Controllers\TableditController@action')->name('tabledit.action');
Route::post('/SchoolCreate', 'App\Http\Controllers\StudentController@schoolCreate');
Route::post('/ClassCreate', 'App\Http\Controllers\StudentController@classCreate');
Route::post('/StudentCreate', 'App\Http\Controllers\StudentController@studentCreate');
Route::get('/firstname', 'App\Http\Controllers\StudentSearchController@getStudent');