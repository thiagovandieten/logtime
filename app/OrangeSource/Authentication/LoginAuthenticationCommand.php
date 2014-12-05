<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 21/11/14
 * Time: 10:53
 */

namespace OrangeSource\Authentication;


class LoginAuthenticationCommand {

    protected $user;

    function __construct($user)
    {
        $this->user = $user;
    }

    public function auth()
    {
        echo 'hoi';
    }
} 