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
		return $this->belongsToMany('ProjectGroup', 'group_project_periode')->withPivot('is_done')->withTimestamps();
	}

	public function categorie()
	{
		return $this->belongsToMany('Categorie', 'categories_projects')->withTimestamps();
	}

	public function LevelType()
	{
		return $this->hasOne('LevelType');
	}

	public function tasks()
	{
		return $this->hasMany('Task');
	}

	public function customers()
	{
		return $this->hasMany('Customer');
	}

	public function estimatedTime()
	{
		return $this->hasMany('EstimatedTime');
	}

	public function years()
	{
		return $this->hasManyThrough('Year', 'ProjectGroup');
	}

}