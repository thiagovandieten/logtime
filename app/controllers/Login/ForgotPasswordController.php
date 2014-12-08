<?php
//TODO: Alle facades (zoals Input) vervangen met instance variablen
namespace Controllers\Login;
use Illuminate\Support\Facades\Redirect;
use User;
class ForgotPasswordController extends \BaseController {

    public function index()
    {
        return \View::make('login.forgotpassword');
    }

    public function execute()
    {
        /* Valideer dat het een e-mail is -- Lijkt me onmogelijk omdat dit super complex is,
         * beter kijken we gewoon of hij in de DB zit */
        //Kijk of het bestaat, zo niet redirect weer naar verloren WW pagina -- gedaan
        //Stuur een mail met gebruikerscode en wachtwoord
        //Redirect naar login met de melding dat het goed gekomen is
        $email = User::where('email', '=', \Input::get('email'))->first();
        if($this->notOfClassUser($email))
        {
            return Redirect::route('forgotpassword.index')->withErrors(['E-mail niet gevonden!']);
        }
        return dd(class_basename($email));
    }

    public function notOfClassUser($email)
    {
        return class_basename($email) != 'User'; //class_basename is een laravel helper, zie docs
    }
} 