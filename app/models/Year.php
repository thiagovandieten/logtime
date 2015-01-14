<?php

class Year extends Eloquent {

	public function projectGroups()
	{
		return $this->hasMany('ProjectGroup');
	}

	public function location()
	{
		return $this->belongsTo('Location');
	}

}
