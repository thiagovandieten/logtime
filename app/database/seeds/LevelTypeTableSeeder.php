<?php

class LevelTypeTableSeeder extends Seeder {

	public function run()
	{
		$leveltype = new LevelType();
		$leveltype->level_type_name = "Project";
		$leveltype->save();

		$leveltype = new LevelType();
		$leveltype->level_type_name = "Werk methode";
		$leveltype->save();
	}

}