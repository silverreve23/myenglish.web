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

Route::middleware('api')->get('/get-word/{email}', 'APIController@getWord');
Route::middleware('api')->get('/update-status/success/{word}/{email}', 'APIController@successPriority');
Route::middleware('api')->get('/update-status/fails/{word}/{email}', 'APIController@failsPriority');
Route::middleware('api')->get('/check-user/{email}/{name}', 'APIController@checkUser');