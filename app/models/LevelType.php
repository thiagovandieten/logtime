<?php

class LevelType extends Eloquent{

	protected $table = "level_types";

	public function projects()
	{
		return $this->hasMany('Project');
	}

	public function tasks()
	{
		return $this->hasMany('Task');
	}

	public function categories()
	{
		return $this->hasMany('Categorie');
	}

	public function projectGroup()
	{
		return $this->belongsToMany('ProjectGroup', 'level_types_project_groups');
	}

}