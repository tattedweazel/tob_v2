<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
	'as' => 'home',
	'uses' => 'PagesController@home'
]);

/**
 * Registration
 */
Route::get('/register', [
	'as' => 'register_path',
	'before' => 'guest',
	'uses' => 'RegistrationsController@create'
]);

Route::post('/register', [
	'as' => 'register_path',
	'before' => 'guest',
	'uses' => 'RegistrationsController@store'
]);

/**
 * Sessions
 */

Route::get('/login', [
	'as' => 'login_path',
	'before' => 'guest',
	'uses' => 'SessionsController@create'
]);

Route::post('/login', [
	'as' => 'login_path',
	'before' => 'guest',
	'uses' => 'SessionsController@store'
]);

Route::get('/logout', [
	'as' => 'logout_path',
	'before' => 'auth',
	'uses' => 'SessionsController@destroy'
]);

/**
 * Account
 */
Route::get('/account',[
	'as' => 'update_account_path',
	'before' => 'auth',
	'uses' => 'AccountsController@index'
]);
Route::post('/account',[
	'as' => 'update_account_path',
	'before' => 'auth',
	'uses' => 'AccountsController@update'
]);
Route::post('/account/password',[
	'as' => 'update_password_path',
	'before' => 'auth',
	'uses' => 'AccountsController@updatePassword'
]);

/**
 * Lobby
 */

Route::get('/lobby', [
	'as' => 'lobby_path',
	'before' => 'auth',
	'uses' => 'LobbyController@index'
]);

/**
 * Games
 */

Route::get('/games',[
	'as' => 'games_path',
	'uses' => 'GamesController@index'
]);

Route::post('/games/new', [
	'as' => 'create_game_path',
	'before' => 'auth',
	'uses' => 'GamesController@store'
]);

Route::get('/games/{id}/join',[
	'as' => 'join_game_path',
	'before' => 'auth',
	'uses' => 'GamesController@join'
]);

Route::get('/games/{id}/authorize', [
	'as' => 'match_authorize_path',
	'before' => 'auth',
	'uses' => 'GamesController@authCheck'
]);

Route::post('/games/{id}/authorize', [
	'as' => 'match_authorize_path',
	'before' => 'auth',
	'uses' => 'GamesController@authorize'
]);

Route::get('/games/{id}',[
	'as' => 'match_path',
	'before' => 'auth',
	'uses' => 'GamesController@show'
]);