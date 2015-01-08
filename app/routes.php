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

/**
 * Deze Route group wordt gebruikt voor alle pagina's die een niet ingelogde gebruiker
 * te zien krijgt.
 */
Route::group(array('prefix' => 'login', 'before' => 'guest'), function(){

    Route::get('/', array('as' => 'login.index', 'uses' => 'Controllers\Login\LoginController@index' ));
    Route::post('/', array('as' => 'login.authentication', 'uses' => 'Controllers\Login\LoginController@authentication'));
    Route::get('forgotpassword', array(
        'as' => 'forgotpassword.index',
        'uses' => 'Controllers\Login\ForgotPasswordController@index'
    ));
    Route::post('forgotpassword', array(
        'as' => 'forgotpassword.request',
        'uses' => 'Controllers\Login\ForgotPasswordController@request'
    ));
    Route::get('forgotpassword/{token}', array(
        'as' => 'forgotpassword.create',
        'uses' => 'Controllers\Login\ForgotPasswordController@create'
    ));

    Route::post('forgotpassword/{token}', array(
        'as' => 'forgotpassword.store',
        'uses' => 'Controllers\Login\ForgotPasswordController@store'
    ));
});

Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('login');
});

Route::get('dashboard', array('before' => 'auth', 'uses' => 'dashboardController@showWelcome'));

Route::get('handleiding', 'GuideController@index');

Route::resource('logboek',  'LogbookController');

Route::post('logbook/opslaan', 'logbookController@store');

Route::group(array('before' => array('auth', 'leerling')), function()
{
    Route::get('eenmalige-gegevens','enteronetimedataController@showWelcome');
    Route::resource('projects', 'ProjectManagementController');
    Route::get('persoonlijke-instellingen', 'personalSettingsController@index');
    Route::post('persoonlijke-instellingen/opslaan', 'personalSettingsController@store');
    Route::get('groepsinstellingen', 'GroupSettingsController@group_settings');
    Route::post('groepsinstellingen/opslaan', 'GroupSettingsController@store');
});

Route::group(array('before' => array('auth', 'docent'), 'prefix' => 'docent'), function(){

    Route::resource('projects', 'Controllers\ProjectManagement\DocentProjectManagement');

});


Event::listen('illuminate.query', function($query){
	//var_dump($query);
});
