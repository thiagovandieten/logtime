<?php

class StudentWage extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'student_wage';

	public function projectGroup()
	{
		return $this->hasOne('ProjectGroup');
	}

}