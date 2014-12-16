<?php

class BaseLoggedInController extends BaseController {

    protected $userFullName;

    function __construct()
    {
        if(Auth::check())
        {
            $this->userFullName = Auth::user()->first_name . ' ' . Auth::user()->last_name;
        }

    }
}