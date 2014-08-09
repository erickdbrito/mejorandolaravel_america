<?php

/*Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('candidates/{slug}/{id}', ['as' => 'category', 'uses' => 'CandidatesController@category']);

//erick-brito/1
Route::get('{slug}/{id}', ['as' => 'candidate', 'uses' => 'CandidatesController@show']);


Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

Route::group(['before' => 'guest'], function(){

	Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);
	Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);

});


//Formularios
Route::group(['before' => 'auth'], function(){

	Route::get('account', ['as' => 'account', 'uses' => 'UsersController@account']);
	Route::put('account', ['as' => 'update_account', 'uses' => 'UsersController@updateAccount']);

	Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
	Route::put('profile', ['as' => 'update_profile', 'uses' => 'UsersController@updateProfile']);

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

});
