<?php

class PersonalSettingsController extends BaseLoggedInController {
   
    //public function PersonalSettingsController()
	//{
		//$personal_data = DB::table('users')->select('first_name', 'last_name', 'phone_number', 'password')->where('id', $this->user = User::find(Auth::id()))->get();
        
        //$personal_data = DB::table('adresses')->select('street_id', 'city_id', 'house_number')->get();
        
        //$user = User::find(1);
        //var_dump($user->name);
        
		//return var_dump($personal_data);
		//return View::make('layouts.todo.index', array('tasks' => $taken));
	//}
    
    protected $userFullName;
    
    public function index()
    {
        return View::make('personal_settings')->with(array('userFullName' => $this->userFullName));
    }
}
