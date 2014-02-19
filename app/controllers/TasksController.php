<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id = null)
	{
		// $tasks = Task::with('user')->paginate(3);
		// return View::make('tasks', compact('tasks'));

		if(is_null($id))
		{
	        return Task::with('user')->get();    
	    }
	    else
	    {
	    	$task = Task::with('user')->find($id);

	        if(is_null($task))
	        {
	        	return Response::json('Not found', 404);
	        }
	        else
	        {
	        	return $task;
	        }
	    }
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('new_task');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$newTask = Input::all();

		$task = new Task;

		$task->title = $newTask['title'];
		$task->content = $newTask['content'];
		$task->price = $newTask['price'];
		//$task->deadline = $newTask->deadline;
		$task->user_id = $newTask['user_id'];
		$task->save();

		return Response::json($task);
		// **old way of storing data

		//if(Input::has('title', 'content', 'price', 'deadline')){
			

			// TODO: validation

		// 	$input = Input::all();	

		// 	$task = new Task;
		// 	$task->title = $input['title'];
		// 	$task->content = $input['content'];
		// 	$task->price = $input['price'];
		// 	//$task->deadline = $input['deadline'];
		// 	$task->user_id = $input['user_id'];

		// 	if(Input::hasFile('attachments'))
		// 	{
		// 		$file = Input::file('attachments');
				
		// 		$file->move(public_path(). '/uploads/', time().'-'. $file->getClientOriginalName());
		// 		$filename = time().'-'. $file->getClientOriginalName();

		// 		$task->attachments = $filename;
		// 		// TODO: try catch of file upload error
		// 	}

		// 	$task->save();
			
		// } else{
		// 	return "error";
		// }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Fetch single task
		$task = Task::with('user')->find($id);
		$bid = Bid::with('user')->where('task_id', $id)->get();

		return $task;
		//return $bid->toJson();
		//return View::make('show_task', compact('task', 'bid'));

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
		$updateTask = Input::all();

		$task = Task::find($updateTask['id']);
		if(is_null($task)){
			return Response::json('Task not found', 404);
		}
		$task->title = $updateTask['title'];
		$task->content = $updateTask['content'];
		$task->price = $updateTask['price'];
		$task->deadline = $updateTask['deadline'];
		$task->user_id = $updateTask['user_id'];
		$task->attachments = $updateTask['attachments'];

		$task->save();
		return Response::json($task);

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

	public function getDownload($filename)
	{
		$file = public_path()."/uploads/". $filename;
		//return $file;
        return Response::download($file, $filename);
	}

}