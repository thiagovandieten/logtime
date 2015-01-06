<?php

class LogCategorie extends Eloquent {

	public function projectGroup()
	{
		return $this->hasOne('ProjectGroup');
	}

	public function userLogs()
	{
		return $this->hasMany('UserLog');
	}

}