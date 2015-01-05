<?php

class EstimatedTimeTableSeeder extends Seeder {

    public function run()
    {
        $estimatedtime = new EstimatedTime();
        $estimatedtime->project_group_id = 1;
		$estimatedtime->task_id = 1;
		$estimatedtime->user_id = 1;
		$estimatedtime->time_needed = 1;
        $estimatedtime->save();
    }

}