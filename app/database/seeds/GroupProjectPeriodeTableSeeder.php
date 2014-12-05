<?php
/**
 * Created by PhpStorm.
 * User: nktakumi
 * Date: 28/11/14
 * Time: 13:22
 */

class GroupProjectPeriodeTableSeeder extends Seeder {

    public function run()
    {
        $groupprojectperiode = new GroupProjectPeriode();
        $groupprojectperiode->project_group_id = 1;
		$groupprojectperiode->project_id = 1;
        $groupprojectperiode->save();
    }

}