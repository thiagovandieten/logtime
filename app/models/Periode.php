<?php

class Periode extends Eloquent {

	public function location()
	{
		return $this->hasOne('location');
	}

	public function holidays()
	{
		return $this->hasMany('holiday');
	}

	public function groupProjectPeriode()
	{
	 	return $this->hasMany('GroepProjectPeriode');
	}

}