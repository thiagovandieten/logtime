<?php

class UserType extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_types';

	public function users()
	{
		$this->hasMany('User');
	}

}
