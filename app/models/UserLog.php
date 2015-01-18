<?php

class UserLog extends Eloquent {

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function task()
	{
		return $this->belongsTo('task');
	}

	public function logCategorie()
	{
		return $this->belongsTo('LogCategorie');
	}
}