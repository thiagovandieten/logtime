<?php

class ProjectGroup extends Eloquent {

	public function users()
	{
        return $this->hasMany('User');
	}

	public function adress()
	{
        return $this->hasOne('Adress');
	}

	public function year()
	{
        return $this->belongsTo('Year');
	}

	public function estimatedTimes()
	{
		return $this->hasMany('EstimatedTime');
	}

	public function studentWages()
	{
		return $this->hasMany('studentWage');
	}

	public function userSubGroups()
	{
		return $this->hasMany('UserSubGroups');
	}

	public function logCategories()
	{
		return $this->hasMany('LogCategorie');
	}
	
	public function project()
	{
		return $this->belongsToMany('Project', 'group_project_periode')->withPivot('is_done')->withTimestamps();	
	}

	public function levelType()
	{
		return $this->belongsToMany('LevelType', 'level_types_project_groups')->withTimestamps();
	}



}
