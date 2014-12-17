<?php

class SubGroup extends Eloquent {

	protected $fillable = [];

	public function userSubGroups()
	{
		return $table->hasMany('UserSubGroups');
	}

}