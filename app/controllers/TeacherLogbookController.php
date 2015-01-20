<?php

class TeacherLogBookController extends \BaseLoggedInController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projectGroups = ProjectGroup::where('coach_id' , '=' , \Auth::user()->id)->get();
		foreach ($projectGroups as $projectGroup)
		{
			$coachGroups[$projectGroup->id] = array('name' => $projectGroup->name ,
				'code' 			=> 		$projectGroup->code ,
				'projects'		=>''
				);
				$projectGroup->project;
				$queries = DB::getQueryLog();
				$last_query = end($queries);
					dd($projectGroup->project);


		}

		dd($coachGroups);
		return View::make('teacherlogbook')->with(array('userFullName' => $this->userFullName, 'coachgroups' => $coachGroups ));
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
		//
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
