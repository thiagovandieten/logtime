<?php

class Customer extends Eloquent {

	protected $fillable = [];

	public function project()
	{
		return $table->hasOne('Project');
	}

	public function adress()
	{
		return $this->hasOne('Adress');
	}

    public function projectGroup()
	{
		return $this->hasOne('ProjectGroup');
	}

}