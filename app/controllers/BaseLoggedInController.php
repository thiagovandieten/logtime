<?php

class BaseLoggedInController extends BaseController {

    protected $userFullName;

    public function __construct()
    {

        if(\Auth::check())
        {
            $this->userFullName = \Auth::user()->first_name . ' ' . \Auth::user()->last_name;
        }

        View::share(array('userFullName' => $this->userFullName, 'user_avatar' => \Auth::user()->user_image_path));

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
}