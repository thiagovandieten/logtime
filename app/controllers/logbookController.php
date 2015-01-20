<?php

class LogbookController extends BaseLoggedInController
{

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

		/**
		* userlogs wordt hier op gehaalt chunk omdat de user_logs table zich heel snel gaat opfullen
		*chunK($aantal rijen , function($rijen) [use ($variable , &$wijzigbaar )])
		*/
		$userlogs = array();
		Userlog::chunk(200, function($logs) use (&$userlogs , $user )
		{
			foreach ($logs as $log)
			{
				if($user->id == $log->user_id)
				{
					$userlogs[$log->id] = array(
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
		// create the validation rules ------------------------
        $rules = array(
            'omschrijving'      => 'required', 					// just a normal required validation
            'taak'        		=> 'required|alpha_num', 	        // just a normal required validation
            'starttijd'     	=> 'required|date_format:H:i',      // just a normal required validation
			'stoptijd'    	 	=> 'required|date_format:H:i',		// just a normal required validation
			'date'    			=> 'required|date',                 // just a normal required validation
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form

        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
			return Redirect::back()->with('message' ,  $messages);

        } else {
        	$totalTime = date('H:i', mktime(0,(strtotime(Input::get('stoptijd')) - strtotime(Input::get('starttijd'))) / 60)) . ":00";
        	$userLog = new UserLog;
           	$userLog->start_time = 			Input::get('starttijd');
           	$userLog->stop_time = 			Input::get('stoptijd');
           	$userLog->total_time_in_hours = $totalTime;
           	$userLog->date = 				Input::get('date');
           	$userLog->description = 		Input::get('omschrijving');
           	$userLog->task_id = 			Input::get('taak');
           	$userLog->user_id = 			Auth::id();
           	$userLog->save();
		}


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
		$userlog = UserLog::find($id);
		$userlogs = array(
					 'task' => $userlog->task_id,
					 'categorie' => $userlog->task->categorie_id,
					 'project' => $userlog->task->project_id,
					 'start_time' => date('H:i', (strtotime($userlog->start_time))) ,
					 'stop_time' => date('H:i', (strtotime($userlog->stop_time))) ,
					 'total_time_in_hours' => $userlog->total_time_in_hours ,
					 'description' => $userlog->description ,
					 'date' => $userlog->date ,
					 'id' => $userlog->id
					 );
		return View::make('logbook_edit')->with(array('userlog' => $userlogs));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// create the validation rules ------------------------
        $rules = array(
            'omschrijving'      => 'required', 					// just a normal required validation
            'taak'        		=> 'required|alpha_num', 	        // just a normal required validation
            'starttijd'     	=> 'required|date_format:H:i',      // just a normal required validation
			'stoptijd'    	 	=> 'required|date_format:H:i',		// just a normal required validation
			'date'    			=> 'required|date',                 // just a normal required validation
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form

        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();
            dd($messages);
            // redirect our user back to the form with the errors from the validator
			return Redirect::back()->with('message' ,  $messages);
		}
		else{
			$totalTime = date('H:i', mktime(0,(strtotime(Input::get('stoptijd')) - strtotime(Input::get('starttijd'))) / 60)) . ":00";
        	$userLog = UserLog::find($id);
           	$userLog->start_time = 			Input::get('starttijd');
           	$userLog->stop_time = 			Input::get('stoptijd');
           	$userLog->total_time_in_hours = $totalTime;
           	$userLog->date = 				Input::get('date');
           	$userLog->description = 		Input::get('omschrijving');
           	$userLog->task_id = 			Input::get('taak');
           	$userLog->user_id = 			Auth::id();
           	$userLog->save();
		}
		return Redirect::to('logboek');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$row = ['id' => $id , 'user_id' => Auth::id()];
		Userlog::where($row)->delete();
		return Redirect::back()->with('message' , 'verwijdert');
	}


}
