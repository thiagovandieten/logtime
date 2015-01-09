<?php

class LoginAttempt extends Eloquent {

	public function user()
	{
		return $this->hasOne('user');
	}

}