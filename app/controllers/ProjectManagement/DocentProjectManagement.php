<?php
namespace Controllers\ProjectManagement;

/**
 * Class DocentProjectManagement
 * @package Controllers\ProjectManagement
 * @Author Thiago van Dieten
 */
class DocentProjectManagement extends \BaseLoggedInController {

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => ['post', 'put']));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projectGroups = $this->getActiveProjectGroups();

		$projectIds = $this->extractProjectIds($projectGroups);
		$projects = \Project::find($projectIds);

		return \View::make('projectmanagement.docent.index')->with(array(
			'projects' => $projects,
			'projectgroups' => $projectGroups
		));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
    {
        $location = \Auth::user()->location_id;
        $projects = \Project::where('location_id', '=', $location)->get();
        //TODO: Er moet een link komen tussen project groepen en de locaties waar het toe hoort

		//Pak de meeste recent leerjaar die bij de docent's locatie toebehoort
		$years = \Year::where('location_id', '=', $location)->
						orderBy('id', 'desc')->
						take(4)->get();

		/*
		* Each zorgt dat er een loop is voor elke Year object in Years
		* Die wordt vervolgens toegevoegd aan de $year_ids array
		* de & voor $year_ids zorgt ervoor dat deze array gewijzigd kan worden
		*/
		$year_ids = $years->lists('id');
		$projectGroups = \ProjectGroup::whereIn('year_id', $year_ids)->
							orderBy('year_id')->get();
		return \View::make('projectmanagement.docent.create')->with(array(
			'years' => $years,
			'projectgroepen' => $projectGroups
		));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'project_name' => 'required'
		);

		$messages = array(
			'project_name.required' => 'Project naam is niet ingevuld!'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
        /*
         * Sla de project naam op bij projects.project_name
         * Koppel de level_type aan de project
         * Kijk welke groepen deze project krijgen
         * VOEG NOG DE PERIODE 
         */
        $project = new \Project();
        $project->project_name = \Input::get('project_name');
        $project->location_id = \Auth::user()->location_id;
        $project->save();
        // $project->level_type_id = false  Daar moet ff opnieuw naar gekeken worden in create!
        $projectGroupIds = array();
        $project->projectGroup()->attach(\Input::get('project_groups'));

        return \Redirect::route('docent.projects.index');
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
		$rules = array(
			'project_name' => 'required'
		);

		$messages = array(
			'project_name.required' => 'Project naam is niet ingevuld!'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
		//Refactor voor hergebruik
		$location = \Auth::user()->location_id;

		//Refactor voor hergebruik
		$projectGroups = $this->getActiveProjectGroups();
		$project = \Project::findOrFail($id);

		//Refactor voor hergebruik
		$years = \Year::where('location_id', '=', $location)->
		orderBy('id', 'desc')->
		take(4)->get();

		return \View::make('projectmanagement.docent.edit')->with(array(
			'years' => $years,
			'projectgroepen' => $projectGroups,
			'project' => $project,
			'selectedprojectgroepen' => $project->projectGroup()->get()->lists('id'))
		);

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
		$project = \Project::find($id);
		$project->projectGroup()->detach();
		$project->delete();
		return \Redirect::route('docent.projects.index');
	}


	/**
	 * @param ProjectGroups $projectGroups
	 * @return array
     */
	public function extractProjectIds($projectGroups)
	{
		$projects = array();
		$projectGroups->each(function ($projectGroup)  use (&$projects)
		{
			$projectGroup->project->each(function ($project) use (&$projects)
			{
				if(!in_array($project->id, $projects))
				{
					$projects[] = $project->id;
				}

			});

		});
		return $projects;
	}

	/**
	 * @return mixed
	 */
	public function getActiveProjectGroups()
	{
		return \ProjectGroup::where('active', '=', '1')->get();
	}

}
