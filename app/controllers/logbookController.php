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
		/**
		* hier worden user opghaalt en de log Catgorie die van de user zijn
		*/
		$user = Auth::user();
		$projectGroupId = $user->project_group_id;
		$logCategories = LogCategorie::where( 'project_group_id' , '=' , $projectGroupId )->get();
		foreach ($logCategories as $logC)
		{
			$userLogCategorie[$logC->id] = $logC->log_categorie_name;
		}

		/**
		* userlogs wordt hier op gehaalt chunk omdat de user_logs table zich heel snel gaat opfullen
		*chunK($aantal rijen , function($rijen) [use ($variable , &$wijzigbaar )])
		*/
		$userlogs = array();
		Userlog::chunk(200, function($logs) use (&$userlogs , $user , $userLogCategorie)
		{
			foreach ($logs as $log)
			{
				if($user->id == $log->user_id)
				{
					$userlogs[$log->id] = array('log_categorie' => $userLogCategorie[$log->log_categorie_id] ,
					 'task' => $log->task->task_name,
					 'start_time' => $log->start_time ,
					 'stop_time' => $log->stop_time ,
					 'total_time_in_hours' => $log->total_time_in_hours ,
					 'description' => $log->description ,
					 'date' => $log->date );
				}
			}
		});

		return View::make('logbook')->with(array('userFullName' => $this->userFullName, 'userlogs' => $userlogs ));
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
            'omschrijving'       => 'required|alpha', 						// just a normal required validation
            'taak'        		=> 'required|alpha_num', 	        // just a normal required validation
            'starttijd'     	=> 'required',                      // just a normal required validation
			'stoptijd'    	 	=> 'required',						// just a normal required validation
			'date'    			=> 'required|date',                      // just a normal required validation
			'log categorie'    	=> 'required|alpha_num',                      // just a normal required validation
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

        } else {
            // validation successful ---------------------------

		}
        dd(Input::all());
		return Redirect::back()->with('message' , 'opgeslagen');
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
