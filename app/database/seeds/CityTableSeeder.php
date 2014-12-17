<?php

class CityTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$city = new City();

		$city->city = "Epe";
		$city->save();

	}

}
