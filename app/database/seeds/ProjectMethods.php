<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 28/11/14
 * Time: 13:22
 */

class ProjectMethods extends Seeder {

    public function run()
    {
        $project = new ProjectMethod();
        $project->project_name = "Logtime";
        $project->active = 1;
        $project->location_id = 1;
        $project->save();
    }

}