<?php

class SessionsController extends \BaseController {

	/**
	* Logs a user in
	*/
	public function login()
	{

		$input = Input::all();

		if(isset($input['email']) && isset($input['password'])) {

			$credentials = array(
				'email'=>$input['email'],
				'password'=>$input['password'],
			);

			$user = Sentry::authenticate($credentials, false);

			Session::put('id', $user['id']);
			Session::put('username', $user['username']);


			if(!Sentry::check()){
				//return View::make('login');
				return "not check";
			}
			else {
				return Redirect::to('users');

			}

		} 
		else {
			return View::make('login');
		}
	}

	public function logout(){
		Session::flush();
		Sentry::logout();
		return Redirect::to('login');
	}

}