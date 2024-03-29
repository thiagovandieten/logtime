<?php

class Adress extends Eloquent {

	public function city()
	{
		return $this->belongsTo('City');
	}

	public function street()
	{
		return $this->belongsTo('Street');
	}

	public function zipcode()
	{
		return $this->belongsTo('Zipcode');
	}

	public function users()
	{
		return $this->hasMany('User');
	}

	public function projectGroups()
	{
		return $this->hasMany('ProjectGroup');
	}

	public function customers()
	{
		return $this->hasMany('Customer');
	}

}
