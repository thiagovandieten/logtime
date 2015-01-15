<?php
namespace Controllers\ProjectManagement;
use Illuminate\View\Factory as View;

class DocentProjectManagement extends \BaseLoggedInController {

	protected $view;
	function __construct(View $view)
	{
		parent::__construct();
		$this->view = $view;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->view->make('projectmanagement.docent.index')->withProjects(\Project::all());
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
		$year_ids = array();
		$years->each(function($year) use (&$year_ids)
		{
			$year_ids[] = $year->id;
		});
		$projectGroepen = \ProjectGroup::whereIn('year_id', $year_ids)->
							orderBy('year_id')->get();
		return $this->view->make('projectmanagement.docent.create')->with(array(
			'years' => $years,
			'projectgroepen' => $projectGroepen
		));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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
