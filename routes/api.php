<?php

use Illuminate\Http\Request;
use App\Event;
use App\User;
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
Route::post('logout', 'Auth\LoginController@logout');

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::get('events', 'EventController@index');
Route::get('events/{event}', 'EventController@show');

Route::get('presentations', 'PresentationController@index');
Route::get('presentations/{presentation}/speakers', 'PresentationController@speakers');
Route::get('halls', 'HallController@index');
Route::get('halls/{hall}/events', 'HallController@getEvents');

Route::group(['middleware' => 'auth:api'], function() {    
    Route::post('events', 'EventController@store');
    Route::put('events/{event}', 'EventController@update');
    Route::delete('events/{event}', 'EventController@delete');
    Route::post('events/{event}/members', 'EventController@storeMember');
    Route::post('events/{event}/members/{user}', 'EventController@storeMemberAdmin');
});