<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 28/11/14
 * Time: 13:24
 */

class GroupProjectPeriode extends Eloquent {

    protected $fillable = [];
	protected $table = 'group_project_periode';

	public function projectGroup()
	{
		return $this->hasOne('ProjectGroup');
	}

	public function project()
	{
		return $this->haseOne('Project');
	}

	public function periode()
	{
		return $this->haseOne('Periode');
	}

	public function groupProjectCategories()
	{
		return $this->hasMany('GroupProjectCategorie');
	}
}