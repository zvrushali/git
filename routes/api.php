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

<<<<<<< HEAD
Route::middleware('auth:api')->post('/hello', 'ApiAuthController@login');



Route::post('login', 'Api\ApiAuthController@login');
Route::post('create', 'Api\PasswordResetController@create');
Route::get('find/{token}', 'Api\PasswordResetController@find');
Route::post('reset', 'Api\PasswordResetController@reset');
Route::middleware('auth:api')->group( function () {
Route::post('show','Api\ShowQuestionsController@showQuestion');
Route::post('result','Api\ShowResultController@showResult');
Route::get('logout','Api\ApiAuthController@logout');

=======
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
});
