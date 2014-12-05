<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 28/11/14
 * Time: 13:24
 */

class Project extends Eloquent {

    protected $fillable = [];
	
	public function location()
	{
        return $this->hasOne('Location');
	}
	
	public function projectGroup()
	{
		return $this->belongsToMany('ProjectGroup', 'group_project_periode');	
	}
	
}