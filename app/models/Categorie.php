<?php

class Categorie extends Eloquent {

	protected $fillable = [];

	public function projects()
	{
		return $table->belongsToMany('Project', 'categories_projects')->withTimestamps();
	}

	public function leveltype()
	{
		return $this->belongsTo('LevelType', 'level_type_id');
	}

	public function tasks()
	{
		return $this->hasMany('Task');
	}

	public function groupProjectPeriode()
	{
	 	return $this->belongsToMany('GroepProjectPeriode', 'groep_project_categorie');
	}

	public function projectGroups()
	{
		return $this->hasmany('ProjectGroup');
	}

}