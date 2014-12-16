<?php

class LocationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$location = new Location();
		$location->location = "Harderwijk";
		$location->save();

	}

}
