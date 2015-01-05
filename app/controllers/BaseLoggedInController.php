<?php
use Illuminate\Auth\AuthManager as Auth;

class BaseLoggedInController extends BaseController {

    protected $userFullName;
    protected $string;
    public function __construct()
    {

        if(\Auth::check())
        {
            $this->userFullName = \Auth::user()->first_name . ' ' . \Auth::user()->last_name;
        }

        View::share('userFullName', $this->userFullName);

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