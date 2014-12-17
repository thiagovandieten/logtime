<?php
class BaseLoggedInController extends BaseController {

    protected $userFullName;
	protected $userId;
	protected $group_id;
	protected $projects;

    function __construct()
    {
        if(Auth::check())
        {
            $this->userFullName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        	
			//Project Group ID ophalen
			$this->userId = User::find(Auth::id());
			$this->group_id = $this->userId->project_group_id;
			$this->projects = ProjectGroup::find($this->group_id)->project;
		}
    }
}