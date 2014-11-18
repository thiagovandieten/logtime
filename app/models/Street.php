<?php

class Street extends Eloquent {

	public function adresses()
	{
		$this->hasMany('Adress');
	}

}
