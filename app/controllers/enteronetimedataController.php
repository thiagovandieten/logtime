<?php

class enteronetimedataController extends BaseLoggedInController {

/*
|--------------------------------------------------------------------------
| Default Home Controller
|--------------------------------------------------------------------------
|
| You may wish to use controllers instead of, or in addition to, Closure
| based routes. That's great! Here is an example controller method to
| get you started. To route to this controller, just add the route:
|
| Route::get('/', 'HomeController@showWelcome');
|
*/

    public function index()
    {
        return View::make('enteronetimedata');
    }
	
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
            'phone_number'     => 'required'                        // just a normal required validation
            //'password'         => 'required',
            //'password_confirm' => 'required|same:password' 		// required and has to match the password field
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);
		
		$input = Input::all();
		
		
        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('eenmalige-gegevens')
                ->withErrors($validator);

        } else {
                        
            // validation successful ---------------------------
			$id = User::find(Auth::id());
			
			$inputArray = Input::only('street', 'house_number', 'zipcode', 'city');
			$uniquevalueArray = array();
			$adress_id;	
			$street_id;
			$street;		
			$city_id;
			$city;
			$zipcode_id;
			$zipcode;

			
			$adress_id     = Adress::find($id->adress_id);
		
		
			// TODO: Wanneer adres id 1 is moet hij altijd aangepast worden naar en ander cijfer
			
			if($adress_id->id == 1)
			{
				// dan moet er een nieuwe  worden aangemaakt	
				foreach($inputArray as $key => $data)
				{
					switch($key)
					{
						// zoek of de waarde al bestaat in Streets
						case 'street' : 
								$check_street = Street::where('street', '=', $data)->first();
																
								if($check_street != NULL)
								{
									$street = $check_street;
								}else{
									$street = new Street();
								}
						 
						break;
						case 'house_number' :  // zoek of de waarde al bestaat in Streets
								
										
								if(!empty($street)){
									$street->house_number = $data;
									break;
								}
								
								$check_house_number = Street::where('house_number', '=', $data)->first();
								if($check_house_number != NULL)
								{
									$street = $check_house_number;
								}else{
									$street = new Street();
								}
								
																
								
	
						break;
						case 'zipcode' : 	// zoek of de waarde al bestaat in zipcodes
						$check_zipcode = Zipcode::where('zipcode', '=', $data)->first();
																
								if($check_zipcode != NULL)
								{
									$zipcode = $check_zipcode;	
								}else{
									$zipcode = new Zipcode();
								}
						break;
						case 'city' : 		// zoek of de waarde al bestaat in cities
						$check_city = City::where('city', '=', $data)->first();
																
								if($check_city != NULL)
								{
									$city = $check_city;	
								}else{
									$city = new City();
								}
						break;	
					}
				}	
			}else{
			// adress is niet 1 dus geen nieuwe 	
			$user = User::find($id);   
			
			
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
            

			
			$user->first_name          = Input::get('first_name');
            $user->last_name           = Input::get('last_name');
            $street->street            = Input::get('street');
            $street->house_number      = Input::get('house_number');
            $zipcode->zipcode          = Input::get('zipcode');
            $city->city            	   = Input::get('city');
            $user->phone_number    	   = Input::get('phone_number');
            $user->user_image_path     = $filename;
			$street->save();
            $user->save();
			$zipcode->save();
			$city->save();

			
            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
			
		
			
            	return Redirect::to('dashboard');
			}
		}
	}
}
