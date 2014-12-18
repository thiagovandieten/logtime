<?php

class StudentWage extends Eloquent {

    protected $table = 'student_wage';
    
	public function projectGroup()
	{
		return $this->hasOne('ProjectGroup');
	}

}