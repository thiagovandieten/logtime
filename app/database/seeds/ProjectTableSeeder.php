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

        $project = new Project();
        $project->project_name = "Logtime";
        $project->active = 1;
        $project->location_id = 1;
        $project->level_type_id = 1;
        $project->save();

        $project = new Project();
        $project->project_name = "Pizza Today";
        $project->active = 1;
        $project->location_id = 1;
        $project->level_type_id = 1;
        $project->save();

        $project = Project::find(1);
        $categorie = Categorie::find(1);

        $project->categorie()->sync([1,1]);
        $this->call('TaskTableSeeder');
    }

}