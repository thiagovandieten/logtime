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
		$this->all_students = DB::select('SELECT `first_name`, `last_name`, `id`, `active` FROM `users` ');
		
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
		$locations = DB::table('locations')->get();
		$user_types = DB::table('user_types')->get();
		
		return View::make('studentsettings.create')->with(array('locations' => $locations, 'user_types' => $user_types ));

	}
	
	function save_new_user()
	{
		/**
		*
		*	Tabels die we nodig hebben om een user aan te maken: 
		*	=  `adresses`, `streets`, `cities`, `zipcodes`, `user_types`, `project_group_id`, `locations`
		*
		**/
		
		// Validatie regels voor het valideren
        $rules = array(
            'first_name'       	=> 'required|alpha',
			'last_name'       	=> 'required|alpha',
			'user_type'			=> 'required|numeric',
			'street_name'       => 'required',
			'house_number'      => 'required',
			'zipcode'       	=> 'required',
			'city'      	 	=> 'required',
			'phone_number'      => 'required',
			'location'		    => 'required|numeric',
			'user_code'			=> 'required|numeric'			
		);
		
		// valideer de input fields
        $validator = Validator::make(Input::all(), $rules);
		
		//Data for image upload -------------------------------
        if(Input::hasFile('avatar')){
            $destinatonPath     = '';
            $filename           = '';
            $file               = Input::file('avatar');
            $destinationPath    = public_path().'/images/';
            $filename           = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess      = $file->move($destinationPath, $filename);
        }else{
			$destinationPath = "";	
		}
		
        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // redirect our user back to the form with the errors from the validator
            return Redirect::to('studentsettings/create')
                ->withErrors($validator);
            
            //dd($validator);

        } else {
                        
            // validation successful ---------------------------
            // create the data and save it to db
			
			// User_types tabel
			// Check of de user_type bestaat
			$user_type = DB::table('user_types')->where('id', Input::get('user_type'))->first();
			
			// Als de opgegeven stad niet bestaat voer hem in
			if(!isset($user_type->id)){
				$getUserTypeid = $user_type->id;
			}else{
				$getUserTypeid = 1;
			}
			
			// location tabel
			// Check of de location bestaat
			$locations = DB::table('locations')->where('id', Input::get('location'))->first();
			
			// Als de opgegeven stad niet bestaat voer hem in
			if(!isset($locations->id)){
				$getLocationsid = $locations->id;
			}else{
				$getLocationsid = 1;
			}
			
			// User Table
			DB::table('users')->insert(
				array('user_code' 		=> Input::get('user_code'),
					  'first_name' 		=> Input::get('first_name'),
					  'last_name' 		=> Input::get('last_name'),
					  'phone_number' 	=> Input::get('phone_number'),
					  'user_type_id'	=> $getUserTypeid,
					  'location_id'		=> $getLocationsid,
					  'adress_id'		=> 1,
					  'user_image_path' => $destinationPath  	
					  )
			);
			
			// Cities Table
			// Check of de stad al bestaat
			$city = DB::table('cities')->where('city', Input::get('city'))->first();
			
			// Als de opgegeven stad niet bestaat voer hem in
			if(!isset($city)){
				$getCityid = DB::table('cities')->insertGetId(
					array('city' => Input::get('city'))
				);
			}else{
			// Anders wijs hem toe
				$getCityid = $city->id;	
			}
			
			// Streets Table
			// Check of de stad al bestaat
			$streets = DB::table('streets')->where('street', Input::get('street_name'))->first();
			
			// Als de opgegeven straat niet bestaat voer hem in
			if(!isset($streets->street)){
				$getStreetsid = DB::table('streets')->insertGetId(
					array('street' => Input::get('street_name'),
						  'house_number' => Input::get('house_number'))
				);
			}else{
			// Anders wijs hem toe
				$getStreetsid = $streets->id;	
			}
	
			// Zipcodes Table
			// Check of de zipcode al bestaat
			$zipcodes = DB::table('zipcodes')->where('zipcode', Input::get('zipcde'))->first();
			
			// Als de opgegeven zipcode niet bestaat voer hem in
			if(!isset($zipcodes->zipcode)){
				$getZipcodesid = DB::table('zipcodes')->insertGetId(
					array('zipcode' => Input::get('zipcode'))
				);
			}else{
			// Anders wijs hem toe
				$getZipcodesid = $zipcodes->id;	
			}
			
			// Adresses Table
			// Check of de stad al bestaat
			$adresses = DB::table('adresses')
					->where(array('zipcode_id' => $getZipcodesid,
								  'street_id' => $getStreetsid,
								  'city_id' => $getCityid
					))->first();
			
			// Als de opgegeven straat niet bestaat voer hem in
			if(!isset($adresses->id)){
				$getAdressesid = DB::table('adresses')->insertGetId(
					array('zipcode_id' => $getZipcodesid,
						  'street_id' => $getStreetsid,
						  'city_id' => $getCityid)
				);
			}else{
			// Anders wijs hem toe
				$getAdressesid = $adresses->id;	
			}
			
			// User ID
			$id = DB::getPdo()->lastInsertId();
			
			//Update de Adresses ID van de user
			DB::table('users')
				->where('id', $id)
				->update(array('adress_id' => $getAdressesid));
			
			
            // redirect our user back to the form so they can do it all over again
		    return Redirect::to('studentsettings/create')->with(array("message" => "Nieuwe gebruiker is succesvol aangemaakt in het systeem!"));

        }
	}

	public function delete()
	{	
		
		// Verkrijg de user data
		$id = $_GET['user'];
		$user = User::find($id); 
		
		// User bestaat niet link terug naar het overzicht
		if(empty($user)){
			return Redirect::to('studentsettings');	
		}else{
		// De user bestaat wel
			return View::make('studentsettings.delete');			
		}
		
	}
	
	public function hard_delete()
	{
		// Deleet alles van de USER
	}
	
	public function soft_delete()
	{
		// Validatie regels voor het valideren
        $rules = array(
            'user'       	=> 'required'		
		);
		
		// valideer de input fields
        $validator = Validator::make(Input::all(), $rules);
		
		if ($validator->fails()) {
            // redirect our user back to the form with the errors from the validator
            return Redirect::to('studentsettings')
                ->withErrors($validator);
        } else {
			$id = Input::get('user');
			$user = User::find($id); 
			
			DB::table('users')
				->where('id', $id)
				->update(array('active' => 0));
			
			return Redirect::to('studentsettings')->with('msg', 'Je hebt '.$user->first_name.' '.$user->last_name.' succesvol op inactief gezet!');
		}
		
		// Create view
		//return Redirect::to('studentsettings')->with('error_msg', 'Je hebt '.$user->first_name.' '.$user->last_name.' inactief gezet!');
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
