<?php

class StudentSettingController extends BaseLoggedInController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	protected $all_students;
	
	public function index()
	{
		$this->all_students = DB::select('SELECT `first_name`, `last_name`, `id` FROM `users` ');
		
		$user = User::find(Auth::id());
		//print_r($user);
			
		return View::make('studentsettings')->with(array(
														'userFullName' => $this->userFullName,
														'all_students' => $this->all_students));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function save()
    {
        // create the validation rules ------------------------
        $rules = array(
            'first_name'       => 'required', 						// just a normal required validation
            'last_name'        => 'required', 	                    // just a normal required validation
            'street'           => 'required',                       // just a normal required validation
            'house_number'     => 'required', 						// just a normal required validation
            'zipcode'          => 'required', 	                    // just a normal required validation
            'city'             => 'required', 	                    // just a normal required validation
			'invisible'       => 'required', 						// just a normal required validation
            'phone_number'     => 'required'                        // just a normal required validation
            //'password'         => 'required',
            //'password_confirm' => 'required|same:password' 		// required and has to match the password field
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);
		
		
		$id = Input::get('invisible');
        $user = User::find($id); 
		
		$user           = User::find($id);   
		$adress_id      = Adress::find($user->adress_id);
		
		$street_id      = $adress_id->street_id;
		$street         = Street::find($street_id);
		
		$city_id        = $adress_id->city_id;
		$city           = City::find($city_id);
		
		$zipcode_id     = $adress_id->zipcode_id;
		$zipcode        = Zipcode::find($zipcode_id);
           
        //Data for image upload -------------------------------
        if(Input::hasFile('avatar')){
            $destinatonPath     = '';
            $filename           = '';
            $file               = Input::file('avatar');
            $destinationPath    = public_path().'/images/';
            $filename           = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess      = $file->move($destinationPath, $filename);
        }else{
            $filename = $user->user_image_path;    
        }
		
        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('studentsettings')
                ->withErrors($validator);
            
            //dd($validator);

        } else {
                        
            // validation successful ---------------------------

            // our duck has passed all tests!
            // let him enter the database

            // create the data
			$user_data = User::find($id); 
            $user_data->first_name       = Input::get('first_name');
            $user_data->last_name        = Input::get('last_name');
            $street->street           = Input::get('street');
            $street->house_number     = Input::get('house_number');
            $zipcode->zipcode          = Input::get('zipcode');
            $city->city             = Input::get('city');
            $user_data->phone_number     = Input::get('phone_number');
            $user_data->user_image_path     = $filename;

            // save our data
            $user_data->save();
			$street->save();
			$zipcode->save();
			$city->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('studentsettings');

        }
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		
		// create the validation rules ------------------------
        $rules = array(
            'invisible'       => 'required' 						// just a normal required validation
           );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);
		
		// check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
             return View::make('studentsettings.edit')->with(array("validator" => $validator->messages('Er is iets fout gegaan')));
            
            //dd($validator);

        }else{
			// create the data
			$id = Input::get('invisible');
           	$user           = User::find($id);   
			$adress_id      = Adress::find($user->adress_id);
			
			$street_id      = $adress_id->street_id;
			$street         = Street::find($street_id);
			
			$city_id        = $adress_id->city_id;
			$city           = City::find($city_id);
			
			$zipcode_id     = $adress_id->zipcode_id;
			$zipcode        = Zipcode::find($zipcode_id);
			
			$personal_data = array('first_name' => $user->first_name, 'last_name' => $user->last_name, 
								   'phone_number' => $user->phone_number, 'avatar' => $user->user_image_path, 
								   'street' => $street->street, 'house_number' => $street->house_number,
								   'city' => $city->city, 'zipcode' => $zipcode->zipcode,  'id' => $id);
	
			return View::make('studentsettings.edit')->with(array
				('personal_data' => $personal_data));

			
			 //return View::make('studentsettings.edit')->with(array("validator" => $name));	
		}
				
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return 3;
	}
	
	function create()
	{
		/**
		*	Tabels die we nodig hebben voor een user aan te maken: 
		*	`adresses`, `street`, `cities`, `zipcodes`, `user_types`, `project_group_id`, `locations`
		*
		*
		*/
		
		return View::make('studentsettings.create');

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
