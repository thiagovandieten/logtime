<?php

class Notification extends Eloquent {

	public function users()
	{
		return $table->belongsToMany('User', 'user_notifications')->withTimestamps();
	}

}