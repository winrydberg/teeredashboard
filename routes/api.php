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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
 
Route::post('apply', 'API\ApplicationController@apply');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('me', 'API\AuthController@getAuthUser');
    Route::get('logout', 'API\AuthController@logout');
    Route::get('regions', 'API\ApplicationController@regions');
    Route::get('districts', 'API\ApplicationController@districts');



    // Route::post('apply', 'API\ApplicationController@apply');

 
});
