<?php

use Illuminate\Http\Request;
use App\SubsOrder;
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

Route::get('order', 'SubsOrderController@index');
//Route::get('order/{id}', 'SubsOrderController@show'); 
Route::post('order', 'SubsOrderController@store'); 
Route::put('order/{userAccount}', 'SubsOrderController@update');
Route::delete('order/{userAccount}', 'SubsOrderController@delete');

Route::get('channel', 'SubsChannelController@index');
Route::get('channel/{channelId}', 'SubsChannelController@show'); 
Route::post('channel', 'SubsChannelController@store'); 
Route::delete('channel/{channelName}', 'SubsChannelController@delete');

Route::get('user', 'SubsUserController@index');
Route::get('user/{userAccount}', 'SubsUserController@show');
Route::post('user', 'SubsUserController@store'); 
Route::put('user/{userAccount}', 'SubsUserController@update'); 
Route::delete('user/{userAccount}', 'SubsUserController@delete');