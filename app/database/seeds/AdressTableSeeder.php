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
		$this->call('ZipcodeTableseeder');

		$adress = new Adress();

		$adress->street_id = 1;
		$adress->city_id = 1;
		$adress->zipcode_id = 1;

		$adress->save();

	}

}
