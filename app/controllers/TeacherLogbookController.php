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
		$coachGroups = array();
		$projectTime = array();
		foreach ($projectGroups as $projectGroup)
		{
			foreach ($projectGroup->users as $user) {
				foreach ($user->userLogs as $userLog) {
					$projectTime[$userLog->task->project->id][$userLog->id] = date('H:i', strtotime($userLog->total_time_in_hours));
				}
			}

			$coachGroups[$projectGroup->id] = array(
				'id'	=> $projectGroup->id ,
				'name' 	=> $projectGroup->name ,
				'code' 	=> $projectGroup->code ,
				'projects' => array()
				);

			foreach ($projectGroup->project as $project) 
			{
				if(isset($projectTime[$project->id]))
				{
					$coachGroups[$projectGroup->id]['projects'][$project->id] = array(
						'name' => $project->project_name , 
						'time_spent' => date('H:i:s',array_sum($projectTime[$project->id]) * 3600)
						);
				}
				else
				{
					$coachGroups[$projectGroup->id]['projects'][$project->id] = array(
						'name' => $project->project_name , 
						'time_spent' => 'geen tijd besteed'
						);
				}
			}

				
		}

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
		$coachGroup = ProjectGroup::find($id);
		$users = $coachGroup->users;
		$userlist = $users->lists('first_name' , 'id');

		/**
		* userlogs wordt hier op gehaalt chunk omdat de user_logs table zich heel snel gaat opfullen
		*chunK($aantal rijen , function($rijen) [use ($variable , &$wijzigbaar )])
		*/
		$userlogs = array();
		Userlog::chunk(200, function($logs) use (&$userlogs , $userlist)
		{
			foreach ($logs as $log)
			{
				if(array_key_exists($log->user_id , $userlist))
				{
					$userlogs[$log->id] = array(
					 'user' => $userlist[$log->user_id],
					 'project' => $log->task->project->project_name,
					 'categorie' => $log->task->categorie->categorie_name,
					 'task' => $log->task->task_name,
					 'start_time' => $log->start_time ,
					 'stop_time' => $log->stop_time ,
					 'total_time_in_hours' => $log->total_time_in_hours ,
					 'description' => $log->description ,
					 'date' => $log->date ,
					 'id' => $log->id
					 );
				}
			}
		});
		function sortFunction( $a, $b ) {
    		return strtotime($a["date"]) - strtotime($b["date"]);
		}
		usort($userlogs, "sortFunction");
		return View::make('teacherlogbook_show')->with(array('userFullName' => $this->userFullName , 'userlogs' => $userlogs));
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
