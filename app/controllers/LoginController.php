<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 21/11/14
 * Time: 09:30
 */

class LoginController extends BaseController {

    public function index()
    {
        return View::make('login.index');
    }

    public function authentication()
    {
        //Check of het studentnummer of e-mail is
        //Kijk of de gebruiker gegevens kloppen
        //Identificeer wat voor gebruiker het is
        //Als het een student is, kijk of dit zijn 1e login
        //Stuur hem naar de dashboard met de juiste informatie
        return 'aah';
    }

} 