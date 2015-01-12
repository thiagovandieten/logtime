<?php

class GroupSettingsController extends BaseLoggedInController {
   	
        // ophalen van de volgende gegevens:
        // voornaam, achternaam, straatnaam, huisnummer, postcode, woonplaats, telefoonnummer, wachtwoord 
        // voornaam, achternaam, telefoonnummer, van tabel users
        // straat, woonplaats, huisnummer van tabel adresses
        // wachtwoord van tabel users

        
    public function group_settings()
    {        
        $group_id = $this->user->project_group_id;
        $group = ProjectGroup::find($group_id);
        
        $wages = StudentWage::find($group_id);
        $group_wage = $group->wage;
                
        //dd($group_wage);
                       
        return View::make('group_settings')->with(array('group_name' => $group->name, 'group_image' => $group->image_path, 'group_wage' => $group->wage));
        
        
    }
    
    public function store()
    {
        
        //Data for image upload -------------------------------
        if(Input::hasFile('group_image')){
        $destinatonPath = '';
        $filename = '';
        $file = Input::file('group_image');
        $destinationPath = public_path().'/images/';
        $filename = str_random(3).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        }else{
            $filename = $user->user_image_path;    
        }
        
        // create the validation rules ------------------------
        $rules = array(
            'group_name'       => 'required', 						// just a normal required validation
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
            $group_data              = ProjectGroup::find($this->user->project_group_id);
            $group_data->name        = Input::get('group_name');
            $group_data->image_path  = $filename;
            
            // save our data
            $group_data->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('groepsinstellingen');

        }
    }
        
}
