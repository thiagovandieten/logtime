<?php

class Location extends Eloquent {

	public function users()
	{
		$this->hasMany('User');
	}

}
