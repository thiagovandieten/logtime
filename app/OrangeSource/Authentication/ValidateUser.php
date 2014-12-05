<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 01/12/14
 * Time: 10:11
 */

namespace OrangeSource\Authentication;


class ValidateUser {
    public function checkMailOrUserCode($login_cred)
    {
        if(stripos($login_cred, '@'))
        {
            return 'email';
        }

        return 'user_code';
    }
} 