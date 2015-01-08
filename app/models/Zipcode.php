<?php
class Zipcode extends Eloquent {

	public function adresses()
	{
		return $this->hasMany('Adress');
	}

}