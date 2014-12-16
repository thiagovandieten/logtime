<?php

class LevelType extends Eloquent{

	protected $table = "level_types";
	/*
	LevelType heeft een relatie met projects,
	tasks, categories en level_types_project_groups.
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
		return $this->belongsToMany('ProjectGroup', 'group_project_periode');
	}
	*/
}