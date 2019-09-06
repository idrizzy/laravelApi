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

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{id}', 'ArticleController@show');
Route::post('/articles/{id}/rating', 'RatingController@store');
Route::get('login', 'AuthController@index');
Route::group([

    'middleware' => 'api',

], function ($router) {

    
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
	Route::post('/articles', 'ArticleController@store');
	Route::put('/articles/{id}', 'ArticleController@update');
	Route::delete('/articles/{id}', 'ArticleController@destroy');

});


