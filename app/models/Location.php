<?php

class Location extends Eloquent {

	public function users()
	{
		return $this->hasMany('User');
	}

	public function projects()
	{
		return $this->hasMany('Project');
	}

	public function periodes()
	{
		return $this->hasMany('periode');
	}
}
