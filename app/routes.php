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
	
Route::group(array('prefix' => 'login'), function(){

    Route::get('/', array('as' => 'login.index', 'uses' => 'Controllers\Login\LoginController@index' ));
    Route::post('/', array('as' => 'login.authentication', 'uses' => 'Controllers\Login\LoginController@authentication'));
    Route::get('forgotpassword', array(
        'as' => 'forgotpassword.index',
        'uses' => 'Controllers\Login\ForgotPasswordController@index'
    ));
    Route::post('forgotpassword', array(
        'as' => 'forgotpassword.execute',
        'uses' => 'Controllers\Login\ForgotPasswordController@execute'
    ));
    Route::get('newpassword', array('as' => 'newpassword', function()
    {
        return View::make('login.newpassword');
    }));
});

Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('login');
});


Route::get('dashboard', array('before' => 'auth', 'uses' => 'dashboardController@showWelcome'));

Event::listen('illuminate.query', function($query){
	//var_dump($query);
});
