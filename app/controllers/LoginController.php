<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 21/11/14
 * Time: 09:30
 */

use OrangeSource\Authentication as OsAuth;
use OrangeSource\Commanding\CommandBus;

class LoginController extends BaseController {
  
    protected $commandBus;

    function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }


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
        $input = Input::all();

        $command = new OsAuth\LoginAuthenticationCommand($input['user_code'], $input['password']);

        $this->commandBus->execute($command);


    }

}
