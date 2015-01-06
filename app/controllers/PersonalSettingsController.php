<?php

class PersonalSettingsController extends BaseLoggedInController {
   	
        // ophalen van de volgende gegevens:
        // voornaam, achternaam, straatnaam, huisnummer, postcode, woonplaats, telefoonnummer, wachtwoord 
        // voornaam, achternaam, telefoonnummer, van tabel users
        // straat, woonplaats, huisnummer van tabel adresses
        // wachtwoord van tabel users

        
    public function index()
    {        
        $user           = User::find(Auth::id());   
        $adress_id      = Adress::find($user->adress_id);
        
        $street_id      = $adress_id->street_id;
        $street         = Street::find($street_id);
        
        $city_id        = $adress_id->city_id;
        $city           = City::find($city_id);
        
        $zipcode_id     = $adress_id->zipcode_id;
        $zipcode        = Zipcode::find($zipcode_id);
        
        //dd($zipcode->zipcode);
    
        
        $personal_data = array('first_name' => $user->first_name, 'last_name' => $user->last_name, 
                               'phone_number' => $user->phone_number, 'avatar' => $user->user_image_path, 
                               'street' => $street->street, 'house_number' => $street->house_number,
                               'city' => $city->city, 'zipcode' => $zipcode->zipcode);

        return View::make('personal_settings')->with(array
            ('personal_data' => $personal_data));
    }
    
    public function store()
    {
        $user = User::find(Auth::id());
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

        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('persoonlijke-instellingen')
                ->withErrors($validator);
            
            //dd($validator);

        } else {
                        
            // validation successful ---------------------------

            // our duck has passed all tests!
            // let him enter the database

            // create the data
            $user_data = User::find(Auth::id());
            $user_data->first_name       = Input::get('first_name');
            $user_data->last_name        = Input::get('last_name');
            
            $street->street             = Input::get('street');
            $street->house_number       = Input::get('house_number');
            $zipcode->zipcode           = Input::get('zipcode');
            $city->city                 = Input::get('city');
            $user_data->phone_number    = Input::get('phone_number');
            //$user_data->password = Hash::make(Input::get('password'));
            $user_data->user_image_path     = $filename;
            
            //dd($user_data->phone_number);

            // save our data
            $street->save();
            $zipcode->save();
            $city->save();
            $user_data->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('persoonlijke-instellingen');

        }
    }
    
}