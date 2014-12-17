<?php

class PersonalSettingsController extends BaseLoggedInController {
   	
        // ophalen van de volgende gegevens:
        // voornaam, achternaam, straatnaam, huisnummer, postcode, woonplaats, telefoonnummer, wachtwoord 
        // voornaam, achternaam, telefoonnummer, van tabel users
        // straat, woonplaats, huisnummer van tabel adresses
        // wachtwoord van tabel users

        
    public function index()
    {
        
        $user = User::find(Auth::id());    
        $personal_data = array('first_name' => $user->first_name, 'last_name' => $user->last_name, 'phone_number' => $user->phone_number);

        return View::make('personal_settings')->with(array(
            'personal_data' => $personal_data
             ));
    }
    
    public function store()
    {
        $user = User::find(Auth::id());
        
        //Data for image upload -------------------------------
        $destinatonPath = '';
        $filename = '';
        $file = Input::file('avatar');
        //$destinationPath = public_path().'/_img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        //$uploadSuccess = $file->move($destinationPath, $filename);
        
        // create the validation rules ------------------------
        $rules = array(
            'first_name'       => 'required', 						// just a normal required validation
            'last_name'        => 'required', 	                    // just a normal required validation
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

        } else {
                        
            // validation successful ---------------------------

            // our duck has passed all tests!
            // let him enter the database

            // create the data
            if(Input::hasFile('image')){
                $images = User::find(Auth::id());
                Session::flash('success_insert','<strong>Upload success</strong>');
            }

            $user_data = User::find(Auth::id());
            $user_data->first_name       = Input::get('first_name');
            $user_data->last_name        = Input::get('last_name');
            $user_data->phone_number     = Input::get('phone_number');
            //$user_data->password = Hash::make(Input::get('password'));
            $user_data->user_image_path     = $filename;

            // save our data
            $user_data->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('persoonlijke-instellingen');

        }
    }
    
}