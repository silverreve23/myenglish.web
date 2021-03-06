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

Route::get('/', function(){return view('welcome');});
Route::resource('repeats', 'Admin\\RepeatsController')->middleware('auth');
Route::resource('words', 'Admin\\WordsController')->middleware('auth');
Route::get('home/', 'Admin\\UserController@dashboard')->middleware('auth');
Route::get('change-period/{period}', 'Admin\\UserController@savePeriod')->middleware('auth');
Route::get('change-autochangekeylang/{value}', 'Admin\\UserController@saveAutoChangeKeyLang')->middleware('auth');