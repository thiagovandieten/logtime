<?php

class Task extends Eloquent {

	protected $fillable = [];

	public function projects()
	{
		return $table->hasOne('Project');
	}

	public function leveltype()
	{
		return $this->hasOne('LevelType');
	}

	public function categorie()
	{
		return $this->hasOne('Categorie');
	}

	public function estimatedTimes()
	{
		return $this->hasMany('EstimatedTime');
	}

	public function userLogs()
	{
		return $this->hasMany('UserLog');
	}
}