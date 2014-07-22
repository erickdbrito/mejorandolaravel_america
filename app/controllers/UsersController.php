<?php
use HireMe\Entities\User;

class UsersController extends BaseController{

	public function signUp()
	{
		return View::make('users/sign-up');
	}	

	public function register()
	{
		$data = Input::only(['full_name', 'email', 'password', 'password_confirmation']);
		$rules = [
			'full_name' => 'required',
			'email'		=> 'required|email|unique:users,email',
			'password'	=> 'required|confirmed',
			'password_confirmation' => 'required'
		];


		 $validation = \Validator::make($data, $rules);

		if($validation->passes())
		{
			$user = new User($data);
			$user->type = 'candidato';
			$user->save();

			//User::create($data);
			return Redirect::route('home');
		}

		return Redirect::back()->withInput()->withErrors($validation->messages());

	}
}