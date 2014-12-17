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
            'personal_data' => $personal_data,
            'userFullName' => $this->userFullName, ));
    }
    
    public function store()
    {
        $user = User::find(Auth::id());
        var_dump(Input::all());
    }
        
}
