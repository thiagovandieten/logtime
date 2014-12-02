<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('dashboard');
});

Route::get('dashboard', function()
{
	return View::make('dashboard');
});

Route::get('dashboard', function()
{
	return View::make('dashboard');
});

Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index' ));
Route::post('login', array('as' => 'login.authentication', 'uses' => 'LoginController@authentication'));
Route::post('logout', function(){
    Auth::logout();
    return Redirect::to('login');
});

Route::get('dashboard', array('before' => 'auth', function()
{
   return View::make('dashboard.logout');
}));
