<?php

class BaseLoggedInController extends BaseController {

    protected $userFullName;
    protected $user;
    protected $user_avatar;

    public function __construct()
    {

        if (\Auth::check())
        {
            $this->user = Auth::user();
            $this->userFullName = \Auth::user()->first_name . ' ' . \Auth::user()->last_name;
			
			if($this->user->adress_id == 1){
				echo "Adres 1";	
			}else{
				echo "Adres 0";	
			}
			
        }

        View::share(array(
            'userFullName' => $this->userFullName,
            'user_avatar' => \Auth::user()->user_image_path,
            'user_role' => \Auth::user()->user_type_id));

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