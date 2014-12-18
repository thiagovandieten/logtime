<?php

class GroupProjectCategorie extends Eloquent {

	public function projectGroupPeriode()
	{
		return $this->hasOne('ProjectGroupPeriode');
	}

	public function categorie()
	{
		return $this->haseOne('Categorie');
	}

}