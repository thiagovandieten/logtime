<?php

class GroupSettingsController extends BaseLoggedInController {
   	
        // ophalen van de volgende gegevens:
        // voornaam, achternaam, straatnaam, huisnummer, postcode, woonplaats, telefoonnummer, wachtwoord 
        // voornaam, achternaam, telefoonnummer, van tabel users
        // straat, woonplaats, huisnummer van tabel adresses
        // wachtwoord van tabel users

        
    public function group_settings()
    {
        
          //$project_group  = showWelcome->project_group_id; 
          //dd($user->project_group_id);
        
        $user = User::find(Auth::id());    
        $group_data = array('first_name' => $user->first_name, 'last_name' => $user->last_name, 'phone_number' => $user->phone_number);

        return View::make('group_settings')->with(array(
            'group_data' => $group_data
             ));
    }
    
    public function store()
    {
        $user = User::find(Auth::id());
        var_dump(Input::all());
        
         // create the validation rules ------------------------
        $rules = array(
            'wage'       => 'required', 						// just a normal required validation
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('groepsinstellingen')
                ->withErrors($validator);

        } else {
                        
            // validation successful ---------------------------

            // our duck has passed all tests!
            // let him enter the database

            // create the data
            $group_data = User::find(Auth::id());
            $group_data->first_name       = Input::get('first_name');
            $group_data->last_name        = Input::get('last_name');
            $group_data->phone_number     = Input::get('phone_number');
            //$duck->password = Hash::make(Input::get('password'));

            // save our data
            $user_data->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('groepsinstellingen');

        }
    }
        
}
