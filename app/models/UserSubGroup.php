<?php

class UserSubGroup extends Eloquent {

	protected $fillable = [];

	public function subGroup()
	{
		return $table->hasOne('SubGroup');
	}

	public function user()
	{
		return $table->hasOne('User');
	}

	public function projectGroup()
	{
		return $table->hasOne('ProjectGroup');
	}

}