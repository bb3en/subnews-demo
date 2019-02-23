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

Route::get('SubsOrder', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return SubsOrder::all();
});

Route::get('SubsOrder/{id}', function($id) {
    return SubsOrder::find($id);
});

Route::post('SubsOrder', function(Request $request) {
    return SubsOrder::create($request->all);
});

Route::put('SubsOrder/{id}', function(Request $request, $id) {
    $article = SubsOrder::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('SubsOrder/{id}', function($id) {
    Article::find($id)->delete();

    return 204;
});