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
		$user = User::find(Auth::id());
		$logCategories = LogCategorie::where('project_group_id','=',$user->project_group_id)->get();
		$projectIds = GroupProjectPeriode::where('project_group_id','=',$user->project_group_id)->get();
		dd($projectIds);
		$userLogs = $this->userLogs->where('user_id','=', $user->id)->get();
		return View::make('logbook')->with(array('userFullName' => $this->userFullName, 'userLogs' => $userLogs));
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
