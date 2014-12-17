<?php

class AdressTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('StreetTableSeeder');
		$this->call('CityTableSeeder');

		$adress = new Adress();

		$adress->house_number = 1;
		$adress->street_id = 1;
		$adress->city_id = 1;

		$adress->save();

	}

}
