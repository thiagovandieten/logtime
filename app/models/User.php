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

	public function userSubGroups()
	{
		return $table->hasMany('UserSubGroups');
	}

	public function userLogs()
	{
		return $this->hasMany('UserLog');
	}

	public function estimatedTimes()
	{
		return $this->hasMany('EstimatedTime');
	}

	public function loginAttempt()
	{
		return $this->hasMany('LoginAttempt');
	}

	public function notifications()
	{
		return $table->belongsToMany('Notification', 'user_notifications')->withTimestamps();
	}

	public function UserSubGroup()
	{
		return $table->hasMany('UserSubGroup');
	}

	public function passwordTokens()
	{
		return $table->hasMany('PasswordToken');
	}

	public function projectGroup()
	{
		return $table->belongsToMany('ProjectGroup', 'project_groups_users')->withTimestamps();
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
