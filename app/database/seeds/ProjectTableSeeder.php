<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 28/11/14
 * Time: 13:22
 */

class ProjectTableSeeder extends Seeder {

    public function run()
    {
        $this->call('LevelTypeTableSeeder');
        $this->call('CategorieTableSeeder');
        $this->call('TaskTableSeeder');

        $project = new Project();
        $project->project_name = "Logtime";
        $project->active = 1;
        $project->location_id = 1;
        $project->level_type_id = 0;
        $project->save();

        $project = new Project();
        $project->project_name = "Pizza Today";
        $project->active = 1;
        $project->location_id = 1;
        $project->level_type_id = 0;
        $project->save();
    }

}