<?php

class Street extends Eloquent {

	public function adresses()
	{
		return $this->hasMany('Adress');
	}

}
