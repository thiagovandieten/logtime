<?php

namespace Controllers\TaskManagement;

class Docent extends \BaseLoggedInController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($projectId)
	{
		$project = \Project::find($projectId);
		$tasks = \Task::where('project_id', '=', $projectId)->get();

		return \View::make('tasks.docent.index')->with(array(
			'project' => $project,
			'tasks' => $tasks
		));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($projectId)
	{
		return \View::make('tasks.docent.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($projectId)
	{
		return Redirect::route('tasks.docent.index', $projectId);
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


}
