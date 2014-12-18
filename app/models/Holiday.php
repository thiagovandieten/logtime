<?php

class Holidays extends Eloquent {

	protected $fillable = [];

	public function periode()
	{
		return $this->hasOne('Periode');
	}

}