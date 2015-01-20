<?php

class GroupSettingsController extends BaseLoggedInController {
   	
        // ophalen van de volgende gegevens:
        // voornaam, achternaam, straatnaam, huisnummer, postcode, woonplaats, telefoonnummer, wachtwoord 
        // voornaam, achternaam, telefoonnummer, van tabel users
        // straat, woonplaats, huisnummer van tabel adresses
        // wachtwoord van tabel users

        
    public function group_settings()
    {                
        $group_id       = $this->user->project_group_id;
        $group          = ProjectGroup::find($group_id);
        
        $adress_id      = Adress::find($group->adress_id);

        $street_id      = $adress_id->street_id;
        $street         = Street::find($street_id);

        $city_id        = $adress_id->city_id;
        $city           = City::find($city_id);

        $zipcode_id     = $adress_id->zipcode_id;
        $zipcode        = Zipcode::find($zipcode_id);
        
        $wages          = StudentWage::find($group_id); 
        $group_wage     = str_replace('.', ',', $wages->wage);
                                       
        return View::make('group_settings')->with(array('group_name' => $group->name, 'street' => $street->street, 
                                                        'house_number' => $street->house_number, 'city' => $city->city, 
                                                        'zipcode' => $zipcode->zipcode, 'group_image' => $group->image_path, 
                                                        'group_wage' => $group_wage));
        
        
    }
    
    public function store()
    {
        $group_id       = $this->user->project_group_id;
        $group          = ProjectGroup::find($group_id);
        
        $adress_id      = Adress::find($group->adress_id);

        $street_id      = $adress_id->street_id;
        $street         = Street::find($street_id);

        $city_id        = $adress_id->city_id;
        $city           = City::find($city_id);

        $zipcode_id     = $adress_id->zipcode_id;
        $zipcode        = Zipcode::find($zipcode_id);
        
        $wages          = StudentWage::find($group_id); 
        $group_wage     = str_replace('.', ',', $wages->wage);
        //dd($group->image_path);
        
        //Data for image upload -------------------------------
            if(Input::hasFile('group_image')){
                $destinatonPath     = '';
                $filename           = '';
                $file               = Input::file('group_image');
                $filesize           = Input::file('group_image')->getSize();
                $destinationPath    = public_path().'/images/';
                $filename           = str_random(6).'_'.$file->getClientOriginalName();

                // Validation check for extension
                $extension = Input::file('group_image')->getClientOriginalExtension();
                $allowed =  array('png','jpg');

                if(!in_array($extension,$allowed) ) {
                    dd('Dit bestand is niet geldig');
                }
                else {
                    $rules = array('group_image' => 'max:5000000');              // limited file size of 500kb
                    $validator = Validator::make(Input::all(), $rules);
                    
                    if ($validator->fails()){
                        // get the error messages from the validator
                        $messages = $validator->messages('Er is iets fout gegaan');

                        // redirect our user back to the form with the errors from the validator
                        return Redirect::to('group_settings')
                            ->withErrors($validator);
                    }

                    $uploadSuccess = $file->move($destinationPath, $filename);
                    File::delete(public_path().'/images/'.$group->image_path);
                }
            }
            else{
                $filename = $group->image_path;    
            }
                
        // create the validation rules ------------------------
        $rules = array(
            'group_name'       => 'required', 						// just a normal required validation
            'street'           => 'required',                       // just a normal required validation
            'house_number'     => 'required', 						// just a normal required validation
            'zipcode'          => 'required', 	                    // just a normal required validation
            'city'             => 'required', 	                    // just a normal required validation
            'group_wage'       => 'required', 						// just a normal required validation
            //'group_image'      => 'max:5000000|mimes:png',              // limited file size of 500kb
        );
        
        $messages = array(
            'group_name.required'       => 'De groepsnaam is verplicht',
            'street.required'           => 'De straatnaam is verplicht',
            'house_number.required'     => 'Het huisnummer is verplicht',
            'zipcode.required'          => 'De postcode is verplicht',
            'city.required'             => 'De woonplaats is verplicht',
            'group_wage.required'       => 'Het uurloon is verplicht'
        );
        
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules, $messages);

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
            $street->street          = Input::get('street');
            $street->house_number    = Input::get('house_number');
            $zipcode->zipcode        = Input::get('zipcode');
            $city->city              = Input::get('city');
            
            $group_data->image_path  = $filename;
            $wages->wage             = str_replace(',', '.', Input::get('group_wage'));
            
            // save our data
            $group_data->save();
            $street->save();
            $zipcode->save();
            $city->save();
            $wages->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('groepsinstellingen');

        }
    }
        
}
