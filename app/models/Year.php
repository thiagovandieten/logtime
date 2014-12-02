<?php

class Year extends Eloquent {

	public function projectGroups()
	{
		return $this->hasMany('ProjectGroup');
	}

}
