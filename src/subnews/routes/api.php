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
Route::get('order/{id}', 'SubsOrderController@show'); 
Route::post('order', 'SubsOrderController@store'); 
Route::put('order/{id}', 'SubsOrderController@update'); 
Route::delete('order/{id}', 'SubsOrderController@delete');

Route::get('user', 'SubsUserController@index'); 
Route::post('user/store', 'SubsUserController@store'); 
Route::put('user/{userAccount}', 'SubsUserController@update'); 
Route::delete('user/{userAccount}', 'SubsUserController@delete');