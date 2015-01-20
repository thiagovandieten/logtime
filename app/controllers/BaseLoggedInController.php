<?php

class BaseLoggedInController extends BaseController {

    protected $userFullName;
    protected $user;
    protected $user_avatar;
    protected $userProjects;

    public function __construct()
    {

        if (\Auth::check())
        {
            $this->user = Auth::user();
            $this->userFullName = \Auth::user()->first_name . ' ' . \Auth::user()->last_name;
			
        }

        View::share(array(
            'userFullName' => $this->userFullName,
            'user_avatar' => \Auth::user()->user_image_path,
            'user_role' => \Auth::user()->user_type_id,
            'userProjects' => $this->setUserProjects()));

//        View::composer(array('dashboard', 'projectmanagement.index' ), function($view)
//        {
//            $view->with('userFullName', $this->userFullName);
//        });

    }

    public function isDocent()
    {
        if(\Auth::user()->user_type_id != 2)
        {
            return false;
        }
        return true;
    }

    public function setUserProjects()
    {
        if (!$this->isDocent()) {
            /**
            * haalt de project id's op die de gebruiker heeft.
            */
            $projectGroupId = Auth::user()->project_group_id;
            $logCategories = LogCategorie::where( 'project_group_id' , '=' , $projectGroupId )->get();
            $groupProjectPeriodes = GroupProjectPeriode::where( 'project_group_id' , '=' , $projectGroupId )->get();

            /**
            * deze foreach's controleren of het corecteprojecten zijn. daarna schijft hij ze weg in een array.
            */
            $userProjects = array( 'Projects'=> array() , 'Categories' => array() , 'Tasks' => array() , 'Log Categories' => array());
            foreach($groupProjectPeriodes as $groupProjectPeriode)
            {
                $projects = Project::where('id','=', $groupProjectPeriode->project_id)->get();

                foreach ($projects as $project)
                {

                    foreach ($project->categorie as $categorie)
                    {

                        $typeName = $categorie->leveltype->level_type_name;
                        if ($typeName == 'Project')
                        {
                            $userProjects['Categories'][$categorie->id] = $categorie->categorie_name;
                        }
                        elseif ($typeName == 'User')
                        {
                            if ($categorie->project_group_Id == $projectGroupId)
                            {
                                $userProjects['Categories'][$categorie->id] = $categorie->categorie_name;
                            }
                        }
                    }

                    foreach ($project->tasks as $task)
                    {
                        $typeName = $task->leveltype->level_type_name;
                        if ($typeName == 'Project')
                        {
                            $userProjects['Tasks'][$task->id] = $task->task_name;
                        }
                        elseif ($typeName == 'User')
                        {
                            if ($task->project_group_Id == $projectGroupId)
                            {
                                $userProjects['task'][$task->id] = $task->task_name;
                            }
                        }
                    }

                    $typeName = $project->leveltype->level_type_name;
                        if ($typeName == 'Project')
                        {
                            $userProjects['Projects'][$project->id] = $project->project_name;
                        }
                }
            }
            foreach ($logCategories as $logCategorie)
            {
                $userProjects['Log_Categories'][$logCategorie->id] = $logCategorie->log_categorie_name;
            }

            return $userProjects;
        }

    }
}