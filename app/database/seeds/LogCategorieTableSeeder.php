<?php

class LogCategorieTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$logcategorie = new LogCategorie();
		$logcategorie->log_categorie_name = "zelfstandig werken";
		$logcategorie->project_group_id = 1;
		$logcategorie->save();

	}

}