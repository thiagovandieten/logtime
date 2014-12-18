<?php

class BaseLoggedInController extends BaseController {

    protected $userFullName;
    protected $user;
    protected $user_avatar;

    public function __construct()
    {

        if(Auth::check())
        {  
            $this->user = Auth::user();
            $this->userFullName = $this->user->first_name . ' ' . $this->user->last_name;
        }

        View::share(array('userFullName' => $this->userFullName, 'user_avatar' => $this->user->user_image_path));

//        View::composer(array('dashboard', 'projectmanagement.index', 'personal_settings.index' ), function($view)
//        {
//            $view->with('userFullName', $this->userFullName);
//        });

    }
} 