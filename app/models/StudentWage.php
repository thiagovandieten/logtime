<?php

class StudentWage extends Eloquent {

	public function projectGroup()
	{
		return $this->hasOne('ProjectGroup');
	}

}