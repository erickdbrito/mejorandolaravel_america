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

Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);

Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);
