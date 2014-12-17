<?php

class Categorie extends Eloquent {

	protected $fillable = [];

	public function projects()
	{
		return $table->belongsToMany('Project', 'categories_projects');
	}

	public function leveltype()
	{
		return $this->hasOne('leveltype');
	}

	public function tasks()
	{
		return $this->hasMany('task');
	}

	// public function groupProjectPeriode()
	// {
	// 	return $this->belongsToMany('groepProjectPeriode', 'groep_project_categorie');
	// }

}