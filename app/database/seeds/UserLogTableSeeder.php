<?php

class UserLogTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('LogCategorieTableSeeder');
		$userlog = new UserLog();
		$userlog->user_id = "2";
		$userlog->task_id = "1";
		$userlog->log_categorie_id = "1";
		$userlog->start_time = "2015-01-06 08:44:54";
		$userlog->stop_time = "2015-01-06 09:44:54";
		$userlog->date = "2015-01-06";
		$userlog->total_time_in_hours = "01:00:00";
		$userlog->description = "briefing gehad van docent";
		$userlog->save();

	}

}