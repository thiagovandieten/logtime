<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 13/12/14
 * Time: 15:38
 */

class PasswordToken extends Eloquent {

    protected $table = 'forgotten_password_tokens';

    public function user()
    {
        $this->hasOne('User');
    }

}