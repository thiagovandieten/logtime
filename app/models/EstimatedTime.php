<?php

class EstimatedTime extends Eloquent {

	protected $table = 'estimated_time';

	public function projectGroup()
	{
		return $this->hasOne('ProjectGroup');
	}

	public function task()
	{
		return $this->haseOne('Task');
	}

	public function user()
	{
		return $this->haseOne('User');
	}

}