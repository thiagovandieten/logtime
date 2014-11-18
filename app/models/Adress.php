<?php

class Adress extends Eloquent {

	public function city()
	{
		$this->belongsTo('City');
	}

	public function street()
	{
		$this->belongsTo('Street');
	}

	public function users()
	{
		$this->hasMany('User');
	}

	public function projectGroups()
	{
		$this->hasMany('ProjectGroup');
	}

}
