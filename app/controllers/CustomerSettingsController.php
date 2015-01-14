<?php

class CustomerSettingsController extends BaseLoggedInController {
   	
        // ophalen van de volgende gegevens:
        // voornaam, achternaam, straatnaam, huisnummer, postcode, woonplaats, telefoonnummer, wachtwoord 
        // voornaam, achternaam, telefoonnummer, van tabel users
        // straat, woonplaats, huisnummer van tabel adresses
        // wachtwoord van tabel users

        
    public function customer_settings()
    {                
        $group_id       = $this->user->project_group_id;
        
        //$customer       = Customer::find($project_id);
        //dd($customer);
        
        // Projecten ophalen op id
        $projects         = GroupProjectPeriode::find($group_id);
        $project_id       = $projects->project_group_id;
        //$project        = Project::find($project_id);
        
        
        
        $project = DB::table('group_project_periode')->where('group_project_periode.project_group_id', '=', $group_id)
            ->join('projects', 'group_project_periode.project_id', '=', 'projects.id')
            ->select('projects.id', 'projects.project_name')
            ->get();
        
        //dd($project);
        $customer = array();
                
        foreach ($project as $key => $projectid){
            //array_add($customer, $key, DB::table('customers')->where('id', '=', $projectid->id)->get());
            $customer[] = DB::table('customers')->where('id', '=', $projectid->id)->first();
        }
        
        //var_dump($customer);
        
        $projecten = array('projecten' => $project);
        //dd($projecten);
           
       
        //var_dump($project_id);
                    
        return View::make('customer_settings')->with(array('projecten' => $project, 'customers' => $customer));
        
        
        
       
    }
    
    public function customer_settings_edit($id)
    {                
        $project_id     = Request::segment(3);
        $group_id       = $this->user->project_group_id;
                   
        $customer       = Customer::find($project_id);
        
        $adress_id      = Adress::find($customer->adress_id);

        $street_id      = $adress_id->street_id;
        $street         = Street::find($street_id);

        $city_id        = $adress_id->city_id;
        $city           = City::find($city_id);

        $zipcode_id     = $adress_id->zipcode_id;
        $zipcode        = Zipcode::find($zipcode_id);
        
        
        
       //dd($customer);
                                               
        return View::make('customer_settings_edit')->with(array('customer_name' => $customer->customer_name, 'company' => $customer->company, 'street' => $street->street, 
                                                        'house_number' => $street->house_number, 'city' => $city->city, 
                                                        'zipcode' => $zipcode->zipcode, 'project_id' => $project_id
                                                        ));
       
    }
    
    public function store()
    {
        $project_id     = Request::segment(3);
        $group_id       = $this->user->project_group_id;
        $customer       = Customer::find($group_id);
        
        $adress_id      = Adress::find($customer->adress_id);

        $street_id      = $adress_id->street_id;
        $street         = Street::find($street_id);

        $city_id        = $adress_id->city_id;
        $city           = City::find($city_id);

        $zipcode_id     = $adress_id->zipcode_id;
        $zipcode        = Zipcode::find($zipcode_id);
                        
        // create the validation rules ------------------------
        $rules = array(
            'customer_name'    => 'required', 						// just a normal required validation
            'company'          => 'required', 						// just a normal required validation
            'street'           => 'required',                       // just a normal required validation
            'house_number'     => 'required', 						// just a normal required validation
            'zipcode'          => 'required', 	                    // just a normal required validation
            'city'             => 'required' 	                    // just a normal required validation
        );
        
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('klantsinstellingen')
                ->withErrors($validator);

        } else {
                        
            // validation successful ---------------------------

            // our duck has passed all tests!
            // let him enter the database

            // create the data
            $customer_data                = Customer::find($project_id);
            //dd($customer_data);
            $customer_data->customer_name = Input::get('customer_name');
            $customer_data->company       = Input::get('company');
            $street->house_number    = Input::get('house_number');
            $street->street          = Input::get('street');
            $zipcode->zipcode        = Input::get('zipcode');
            $city->city              = Input::get('city');
            
            // save our data
            $customer_data->save();
            $street->save();
            $zipcode->save();
            $city->save();


            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('klantinstellingen');

        }
    }
        
}
