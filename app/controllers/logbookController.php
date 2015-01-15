<?php

class LogbookController extends BaseLoggedInController
{

	private $userLogs;

	public function __construct()
	{
		parent::__construct();
		$this->userLogs = new Userlog;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$user = Auth::user();
		$projectGroupId = $user->project_group_id;
		$logCategories = LogCategorie::where( 'project_group_id' , '=' , $projectGroupId )->get();
		$groupProjectPeriodes = GroupProjectPeriode::where( 'project_group_id' , '=' , $projectGroupId )->get();

		$userProjects = array( 'Projects'=> array() , 'Categories' => array() , 'Tasks' => array() , 'Log Categories' => array());
		foreach($groupProjectPeriodes as $groupProjectPeriode)
		{
			$projects = Project::where('id','=', $groupProjectPeriode->project_id)->get();

			foreach ($projects as $project)
			{

				foreach ($project->categorie as $categorie)
				{

					$typeName = $categorie->leveltype->level_type_name;
					if ($typeName == 'Project')
					{
						$userProjects['Categories'][$categorie->id] = $categorie->categorie_name;
					}
					elseif ($typeName == 'User')
					{
						if ($categorie->project_group_Id == $projectGroupId)
						{
							$userProjects['Categories'][$categorie->id] = $categorie->categorie_name;
						}
					}
				}

				foreach ($project->tasks as $task)
				{
					$typeName = $task->leveltype->level_type_name;
					if ($typeName == 'Project')
					{
						$userProjects['Tasks'][$task->id] = $task->task_name;
					}
					elseif ($typeName == 'User')
					{
						if ($task->project_group_Id == $projectGroupId)
						{
							$userProjects['task'][$task->id] = $task->task_name;
						}
					}
				}

				$typeName = $project->leveltype->level_type_name;
					if ($typeName == 'Project')
					{
						$userProjects['Projects'][$project->id] = $project->project_name;
					}
			}
		}
		foreach ($logCategories as $logCategorie)
		{
			$userProjects['Log_Categories'][$logCategorie->id] = $logCategorie->log_categorie_name;
		}
		$userlogs = array();
		Userlog::chunk(200, function($logs) use (&$userlogs , $user , $userProjects , $logCategories)
		{
			foreach ($logs as $log)
			{
				if($user->id == $log->user_id)
				{
					$userlogs[$log->id] = array('log_categorie' => $userProjects['Log_Categories'][$log->log_categorie_id] ,
					 'task' => $userProjects['Tasks'][$log->task_id],
					 'start_time' => $log->start_time ,
					 'stop_time' => $log->stop_time ,
					 'total_time_in_hours' => $log->total_time_in_hours ,
					 'description' => $log->description ,
					 'date' => $log->date );
				}
			}
			// dd($logCategories($log->log_categorie_id));
		});


		return View::make('logbook')->with(array('userFullName' => $this->userFullName, 'userlogs' => $userlogs, 'userProjects' => $userProjects));
	}


	/**userLogs
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('logbook')->with(array('userFullName' => $this->userFullName));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$user = User::find(Auth::id());

		// create the validation rules ------------------------
        $rules = array(
            'description'       => 'required', 						// just a normal required validation
            'task'        		=> 'required', 	                    // just a normal required validation
            'start_time'     	=> 'required',                        // just a normal required validation
			'end_time'    	 	=> 'required'                        // just a normal required validation
            //'password'         => 'required',
            //'password_confirm' => 'required|same:password' 		// required and has to match the password field
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);
        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
			var_dump($validator->messages());
			//return Redirect::to('logbook')
             //   ->withErrors($validator);

        } else {
            // validation successful ---------------------------

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


}
