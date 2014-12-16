<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function adress()
	{
		return $this->belongsTo('Adress');
	}

	public function location()
	{
        return $this->belongsTo('Location');
	}

	public function userType()
	{
        return $this->belongsTo('UserType');
	}

	public function projectGroup()
	{
        return $this->belongsTo('ProjectGroup');
	}

    public function saveUser($userCode, $password)
    {
        $this->user_code = $userCode;
        $this->password = $password;

        $this->save();
    }


	public static function getMail($email)
	{
		return static::where('email', '=', $email)->first();
	}

}
