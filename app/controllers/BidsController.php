<?php

class BidsController extends \BaseController {

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if(isset($input['bid']))
		{
			$bid = new Bid;
			$bid->price = $input['price'];
			$bid->bidders_id = $input['bidders_id'];
			$bid->task_id = $input['task_id'];
			$bid->status = 0;

			$bid->save();
			$bid_id = $bid->id;

			return Redirect::to('task/'.$bid->task_id.'?bid='.$bid_id);
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
		$bid = Bid::find($id);
		$task = Task::find($bid->task_id);
		$bidder = User::find($bid->bidders_id);
		$comments = Comment::with('user')->where('bid_id', $id)->get();

		//dd($comments);

		return View::make('bid', compact('bid', 'task', 'bidder', 'comments'));	
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
	public function update()
	{
		$input = Input::all();

		 $bid = Bid::find($input['bid_id']);

		 $bid->price = $input['price'];

		 $bid->save();

		 return Redirect::to('bid/'.$input['bid_id']);
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

	public function accept()
	{
		$input = Input::all();

		$bid = Bid::find($input['bid_id']);
		$bid->status = 1;
		$bid->updated_at = NOW();

		$bid->save();

		return Redirect::to('bid/'.$input['bid_id']);
	}

	public function cancel($id)
	{

		$bid = Bid::find($id);
		$bid->status = 0; // 2 = cancel

		$bid->save();

		return Redirect::to('bid/'.$id);
	}

}