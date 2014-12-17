<?php

class CategorieTableSeeder extends Seeder {

	public function run()
	{
		$categorie = new Categorie();
		$categorie->categorie_name = "fase 0";
		$categorie->level_type_id = 1;
		$categorie->save();


	}

}