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

Route::group(['prefix'=>'user','namespace'=>'Subs'], function(){
    Route::get('/', 'UserController@index');
    Route::get('/{userAccount}', 'UserController@show');
    Route::post('/', 'UserController@store'); 
    Route::put('/{userAccount}', 'UserController@update'); 
    Route::delete('/{userAccount}', 'UserController@delete');
});

Route::group(['prefix'=>'order','namespace'=>'Subs'], function(){
    Route::get('/', 'OrderController@index');
    Route::post('/', 'OrderController@store'); 
    Route::put('/{userAccount}', 'OrderController@update');
    Route::delete('/{userAccount}', 'OrderController@delete');
});

Route::group(['prefix'=>'channel','namespace'=>'Subs'], function(){
    Route::get('/', 'ChannelController@index');
    Route::get('/{channelId}', 'ChannelController@show'); 
    Route::post('/', 'ChannelController@store'); 
    Route::delete('/{channelName}', 'ChannelController@delete');
});





