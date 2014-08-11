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

	require(__DIR__ . '/routes/auth.php');

	// Admin routes


	Route::group(['before' => 'is_admin'], function(){

			require(__DIR__ . '/routes/admin.php');

	});

});
