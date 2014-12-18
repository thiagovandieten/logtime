<?php

class UserSubGroup extends Eloquent {


	public function users()
	{
		return $this->hasMany('User');
	}

	public function subGroups()
	{
		return $this->hasmany('SubGroup');
	}

	public function projectGroups()
	{
		return $this->hasMany('ProjectGroups');
	}

}