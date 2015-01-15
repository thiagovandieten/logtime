<?php

class CustomerTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$customer = new Customer();
        $customer->project_group_id = 1;
        $customer->project_id = 1;
		$customer->customer_name = "Alfredo";
        $customer->company = "Landstede B.V.";
		$customer->adress_id = 1;
		$customer->save();
	}

}