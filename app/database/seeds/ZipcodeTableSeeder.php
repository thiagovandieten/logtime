<?php

class ZipcodeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$zipcode = new Zipcode();

		$zipcode->Zipcode = "3882 BJ";
		$zipcode->save();

	}

}