<?php

class ProjectGroup extends Eloquent {

	public function users()
	{
		$this->hasMany('User');
	}

	public function adress()
	{
		$this->belongsTo('Adress');
	}

	public function year()
	{
		$this->belongsTo('Year');
	}

}
