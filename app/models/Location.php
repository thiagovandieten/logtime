<?php

class Location extends Eloquent {

	public function users()
	{
		return $this->hasMany('User');
	}

}
