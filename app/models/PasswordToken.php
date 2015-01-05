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
        return $this->hasOne('User');
    }

    public static function doesTokenExist($token)
    {
        return static::where('forgotten_password_token', '=', $token)->first();
    }

}