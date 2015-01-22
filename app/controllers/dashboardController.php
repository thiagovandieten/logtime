<?php

class dashboardController extends BaseLoggedInController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $sqldata, $user, $group_id, $projects;


	public function returnTaskName($id)
	{
		//$task = DB::table('tasks')->select('*')->where('id',$id)->first();
		$task = Task::find($id);
		return $task['task_name'];

	}
	
	public function returnTaskId($id)
	{
		$task = Task::find($id);
		return $task['id'];
	}
	
	public function returnProjectName($id)
	{
		
		$task = Project::find($id);
		return $task['project_name'];
	}
	
	protected function getStudent($group_id)
	{
		$users = User::where('project_group_id', $group_id)->first();
		return $users->first_name;
	}
	
	protected function countEstimatedTime($user_id, $task_id)
	{
		$newtime = 0;
		$userLogs = UserLog::where(array('user_id' => $user_id, 'task_id'=>$task_id))->get();
		

		foreach($userLogs as $time)
		{
			$newtime = $newtime + $time['total_time_in_hours'];	
		}
		

		return date('H:i:s', $newtime * 3600);
	}
	
	public function index()
	{
		if (Auth::check())
		{
			//Ingelogte USER
			$this->user = User::find(Auth::id());

			//Project Group ID ophalen
			$this->group_id = $this->user->project_group_id;
			if(!empty($this->group_id)){
				
				if($this->user->user_type_id != 2){
							$total = 0;
					/* 
					
						Veramel de projecten die de groep heeft kijk wie er in de groep zit
					*/
					
					
					$group_project_periode = DB::table('group_project_periode')->select('*')->where('project_group_id',$this->group_id)->get();
					
					foreach($group_project_periode as $key => $data)
					{
						$projectData[$data->id][$data->project_id]['project_name'] = self::returnProjectName($data->project_id);
						$projectData[$data->id]['id'] = $data->project_id;
						$projectData[$data->id][$data->project_id]['group_id'] = $this->group_id;
						
					}
					
					$users_in_group = User::where('project_group_id', $this->group_id)->get();
					
					foreach($users_in_group as $data)
					{
						
						## Haal de userlog gegevsn binnen
						$userLogs = UserLog::where('user_id',$data->id)->first();
						$newtime = 0;
						
						$task_db = Task::find($userLogs['task_id']);
						echo $task_db['project_id'];

						# bereken estimated time
						$time = strtotime($userLogs['total_time_in_hours']);
			//			$studentsData[$data->id]['project_id'] = $task_db['project_id'];
						$studentsData[$data->id][$task_db['project_id']][$this->group_id]['time_spend'] = self::countEstimatedTime($data->id, $userLogs['task_id']);
						$studentsData[$data->id][$task_db['project_id']][$this->group_id]['name'] = $data->first_name;
						$studentsData[$data->id][$task_db['project_id']][$this->group_id]['latest_update'] = $data->updated_at;
			
						
			
					}
					
					
					//print_r($studentsData);
					//print_r($projectData);
					
					
					return View::make('dashboard')->with(array(
					 'projectData' => $projectData, 'studentData' => $studentsData));
				}else{
					$this->projects = ProjectGroup::find($this->group_id)->project;
							return View::make('dashboard')->with(array(
					'viewData' => $viewData));
				}
			}else{
				//Gebruiker heeft geen groep id.
				
				return View::make('dashboard')->with(array(
					'msg' => 'Om een overzicht van je logs te kunnen zien heb je een groep nodig, raadpleeg een leraar om je in te delen in een groep!'));
			}
		}
	}
}
