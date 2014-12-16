<?php

class TaskTableSeeder extends Seeder {

	public function run()
	{
		$task = new Task();
		$task->task_name = "fase 0a de briefing";
		$task->project_id = 0;
		$task->categorie_id = 0;
		$task->level_type_id = 0;
		$task->save();


	}