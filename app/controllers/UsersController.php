<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return View::make('profile');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();
		// TODO: Validate user input
		
		// Store in storage
		if(isset($input['signup'])){
			$user = Sentry::register(array(
				'email'=>$input['email'],
				'username'=>$input['username'],
				'password'=>$input['password'],
			));

			dd($user);
			//$activationCode = $user->getActivationCode();
		}
		echo "?";
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

	public function register()
	{
		if(isset($_REQUEST['signup'])){
			$input = Input::all();
			// TODO: Validate user input

			$user = Sentry::register(array(
				'email'=>$input['email'],
				'username'=>$input['username'],
				'password'=>$input['password'],
			));

			$activationCode = $user->getActivationCode();
		} else
		{
			return View::make('register');
		}
	}
}