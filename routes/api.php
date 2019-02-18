<?php

use Illuminate\Http\Request;
// use App\Http\
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



//Login - Register
Route::post('user/register', 'RegisterAdminController@register');
Route::post('user/login', 'LoginController@login');

Route::group(['middleware' => ['auth.user']], function () {

Route::post('user/login/magic-link', 'MagicLinkController@sendToken');
Route::get('user/login/validate-token', 'MagicLinkController@validateToken');
//campaign
Route::get('campaigns/{id}', 'CampaignController@show');
Route::get('campaigns', 'CampaignController@index');
Route::post('campaigns', 'CampaignController@store');
Route::put('campaigns/edit/{id}', 'CampaignController@update');
Route::delete('campaigns/{id}', 'CampaignController@destroy');
//user
Route::get('campaigns/{id}/users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::put('users/edit/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');
//note
Route::get('campaign/{campaignId}/sent-notes/user/{userId}', 'NoteController@notesFromUser');
Route::post('notes', 'NoteController@store');
Route::get('user/{id}/notes', 'NoteController@notesToUser');

});