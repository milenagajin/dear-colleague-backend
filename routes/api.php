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

//Login - Register
Route::post('user/register', 'RegisterAdminController@register');
Route::post('user/login', 'LoginController@login');
//campaign
Route::get('campaigns/{id}', 'CampaignController@show');
Route::get('campaigns', 'CampaignController@index');
Route::post('campaigns', 'CampaignController@store');
Route::put('campaigns/edit/{id}', 'CampaignController@update');
Route::delete('campaigns/{id}', 'CampaignController@destroy');