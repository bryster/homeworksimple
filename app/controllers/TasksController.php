<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = Task::with('user')->paginate(3);
		return View::make('tasks', compact('tasks'));
		
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
		
		if(Input::has('title', 'content', 'price', 'deadline')){
			

			// TODO: validation

			$input = Input::all();	

			$task = new Task;
			$task->title = $input['title'];
			$task->content = $input['content'];
			$task->price = $input['price'];
			//$task->deadline = $input['deadline'];
			$task->user_id = $input['user_id'];

			if(Input::hasFile('attachments'))
			{
				$file = Input::file('attachments');
				
				$file->move(public_path(). '/uploads/', time().'-'. $file->getClientOriginalName());
				$filename = time().'-'. $file->getClientOriginalName();

				$task->attachments = $filename;
				// TODO: try catch of file upload error
			}

			$task->save();
			
		} else{
			return "error";
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
		// Fetch single task
		$task = Task::findOrFail($id);
		$user = User::findOrFail($task['user_id']);
		
		return View::make('show_task', compact('task'));
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

	public function getDownload($filename)
	{
		$file = public_path()."/uploads/". $filename;
		//return $file;
        return Response::download($file, $filename);
	}

}