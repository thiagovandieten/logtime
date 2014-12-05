<?php

class dashboardController extends BaseController {

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
	
	public function showWelcome()
	{
		if (Auth::check())
		{
			//Ingelogte USER
			$this->user = User::find(Auth::id());
			
			//Project Group ID ophalen
			$this->group_id = $this->user->project_group_id;
			
			$this->projects = ProjectGroup::find($this->group_id)->project;
			
		}
	
		return View::make('dashboard')->with('projects', $this->projects);
	}
}
