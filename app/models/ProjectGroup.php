<?php

class ProjectGroup extends Eloquent {

	public function users()
	{
        return $this->hasMany('User');
	}

	public function adress()
	{
        return $this->belongsTo('Adress');
	}

	public function year()
	{
        return $this->belongsTo('Year');
	}
	
	public function project()
	{
		return $this->belongsToMany('Project', 'group_project_periode');	
	}

}
