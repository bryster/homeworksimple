<?php

use Acme\Transformers\TaskTransformer;

class TasksController extends ApiController {

	/**
	*
	* @var Acme\Transformers\taskTransformer
	*
	*/
	protected $taskTransformer;

	function __construct(TaskTransformer $taskTransformer)
	{
		$this->taskTransformer =  $taskTransformer;

		$this->beforeFilter('auth.basic', ['on' => 'post']);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks =  Task::all(); 

		return $this->respond([
				'data' => $this->taskTransformer->transformCollection($tasks->all())
			]);
		
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
		if( ! Input::get('title') or ! Input::get('content'))
		{

			return $this->respondInvalidParameters('Parameters failed validation for a lesson.');
		}

		Task::create(Input::all());

		return $this->respondCreated('Task successfully created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = Task::find($id);

		if(! $task)
		{
			return $this->respondNotFound('Task does not exist.');
		}

		return $this->respond([
			'data' => $this->taskTransformer->transform($task)
			]);

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