<?php

class City extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

	public function adresses()
	{
		return $this->hasMany('Adress');
	}

}
