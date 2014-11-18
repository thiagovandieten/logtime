<?php

class Year extends Eloquent {

	public function projectGroups()
	{
		$this->hasMany('ProjectGroup');
	}

}
