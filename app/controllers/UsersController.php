<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		// Validate user input
		
		// Store in storage
		if(isset($input['signup'])){
			$user = Sentry::register(array(
				'email'=>$input['email'],
				'username'=>$input['username'],
				'password'=>$input['password'],
				'username'=>$input['username'],
			));

			$activationCode = $user->getActivationCode();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Logs a user in
	*/
	public function login()
	{

		$input = Input::all();

		if(isset($input['login']) && isset($input['email']) && isset($input['password'])) {
			echo $input['email']. " ". $input['password'];
		} else {
			return View::make('login');
		}

		//$user = Sentry::where('email', '=', $input['email'])->firstOrFail();
	}

}