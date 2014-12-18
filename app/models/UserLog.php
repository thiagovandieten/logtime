<?php

class UserLog extends Eloquent {

	public function user()
	{
		return $this->hasOne('User');
	}

	public function task()
	{
		return $this->hasOne('task');
	}

	public function logCategorie()
	{
		return $this->hasOne('LogCategorie');
	}
}