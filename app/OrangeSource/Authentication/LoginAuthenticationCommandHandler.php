<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 25/11/14
 * Time: 07:07
 */

namespace OrangeSource\Authentication;

use OrangeSource\Commanding\CommandHandler;
use User;

class LoginAuthenticationCommandHandler implements CommandHandler {

    protected $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle($command)
    {
        $this->user->post(
            $command->user_code,
            $command->password
        );
        var_dump('Delegate process');
    }
} 