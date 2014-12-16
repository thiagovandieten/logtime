<?php
//TODO: Alle facades (zoals Input) vervangen met instance variablen
namespace Controllers\Login;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Mail\Mailer;
use OrangeSource\Validation\CheckClass;
use User;


class ForgotPasswordController extends \BaseController {

    protected $mailer;
    protected $checkClass;

    function __construct(Mailer $mailer, CheckClass $checkClass)
    {
        $this->mailer = $mailer;
        $this->checkClass = $checkClass;
    }

    public function index()
    {
        return \View::make('login.forgotpassword');
    }

    public function execute()
    {
        /* Valideer dat het een e-mail is -- Lijkt me onmogelijk omdat dit super complex is,
         * beter kijken we gewoon of hij in de DB zit */
        //Kijk of het bestaat, zo niet redirect weer naar verloren WW pagina -- gedaan
        //Stuur een mail met token
        //Redirect naar login met de melding dat het goed gekomen is
        $user = User::getMail( \Input::get('email') );
        //Check of de gebruiker bestaat
        if($this->checkClass->notUser($user))
        {
            return Redirect::route('forgotpassword.index')->withErrors(['E-mail niet gevonden!']);
        }

        //Maak een verloren ww ding aan.
        //TODO: Maak er een eigen class van
        $token = new \PasswordToken();
        $token->forgotten_password_token = str_random(100); //TODO: Klagen bij Philip dat forgotten_password_toen te breedsprakig is.
        $token->user_id = $user->id;
        $token->save();
        //Stuur een e-mail

        $this->mailer->pretend('emails.auth.reminder', array('email' => $user->email, 'token' => $token->forgotten_password_token), function($message) use($user)
        {
            $message->from('noreply@logtime.nl', 'Logtime');
            $message->to($user->email, "$user->first_name $user->last_name")->
                subject('Logtime: Verloren wachtwoord ');

        });

        return Redirect::to('login')->withMessage('Uw verzoek voor een nieuw wachtwoord is verstuurd!');

    }

    public function notOfClassUser($email)
    {
        return class_basename($email) != 'User'; //class_basename is een laravel helper, zie docs
    }
} 