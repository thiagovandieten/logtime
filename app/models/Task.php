<?php

class Task extends Eloquent {

	protected $fillable = [];

	public function project()
	{
		return $this->belongsTo('Project');
	}

	public function leveltype()
	{
		return $this->belongsTo('LevelType', 'level_type_id');
	}

	public function categorie()
	{
		return $this->belongsTo('Categorie');
	}

	public function estimatedTimes()
	{
		return $this->hasMany('EstimatedTime');
	}

	public function userLogs()
	{
		return $this->hasMany('UserLog');
	}

	public function projectGroups()
	{
		return $this->hasmany('ProjectGroup');
	}
}