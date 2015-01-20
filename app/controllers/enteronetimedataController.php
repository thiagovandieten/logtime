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
 			// adress is niet 1 dus geen nieuwe 	
			$user = User::find(Auth::id());
				
			if($user->adress_id == 1){
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
			$streets = DB::table('streets')->where('street', Input::get('street'))->first();
			
			// Als de opgegeven straat niet bestaat voer hem in
			if(!isset($streets->street)){
				$getStreetsid = DB::table('streets')->insertGetId(
					array('street' => Input::get('street'),
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
			
			//Update de Adresses ID van de user
			DB::table('users')
				->where('id', $user->id)
				->update(array('adress_id' => $getAdressesid));
				
			}else{
				
			
			
			
			
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
			return Redirect::to('dashboard');}
		
			
            	
			
		}
	}
}
