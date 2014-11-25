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
	return Redirect::to('login');
});

Route::get('login', array('as' => 'login.index', 'uses' => 'LoginController@index' ));
Route::post('login', array('as' => 'login.authentication ', function()
{
    return 'Mooi man';
}));