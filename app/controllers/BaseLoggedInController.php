<?php

class BaseLoggedInController extends BaseController {

    protected $userFullName;

    public function __construct()
    {

        if(Auth::check())
        {
            $this->userFullName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        }


        View::composer(array('dashboard', 'projectmanagement.index', 'personal_settings.index' ), function($view)
        {
            $view->with('userFullName', $this->userFullName);
        });

    }
}