<?php

class ProjectGroup extends Eloquent {

	public function users()
	{
        return $this->hasMany('User');
	}

	public function adress()
	{
        return $this->belongsTo('Adress');
	}

	public function year()
	{
        return $this->belongsTo('Year');
	}

}
