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

Route::get('logout', array( 'as' => 'logout', function(){
    Auth::logout();
    return Redirect::to('login');
}));

Route::get('dashboard', array('as' => 'dashboard', 'before' => array('auth', 'geen_gegevens'), 'uses' => 'dashboardController@index'));

Route::get('handleiding', 'GuideController@index');

Route::resource('logboek',  'LogbookController');

Route::post('logbook/opslaan', 'logbookController@store');


//Student settings
Route::group(array('before' => array('auth', 'leerling')), function()
{
	Route::get('studentsettings',  'StudentSettingController@index');
	Route::post('studentsettings/edit',  'StudentSettingController@edit');
	Route::post('studentsettings/save',  'StudentSettingController@save');
	Route::get('studentsettings/create',  'StudentSettingController@create');
	Route::post('studentsettings/create',  'StudentSettingController@save_new_user');
	Route::get('studentsettings/delete',  'StudentSettingController@delete');
	Route::post('studentsettings/delete',  'StudentSettingController@hard_delete');
});



Route::group(array('before' => array('auth', 'leerling')), function()
{
    
    Route::get('eenmalige-gegevens','enteronetimedataController@index');
    Route::post('eenmalige-gegevens','enteronetimedataController@save');
});

Route::group(array('before' => array('auth', 'leerling', 'geen_gegevens')), function()
{
    Route::resource('projects', 'ProjectManagementController');
    Route::get('persoonlijke-instellingen', 'PersonalSettingsController@index');
    Route::post('persoonlijke-instellingen/opslaan', 'PersonalSettingsController@store');
    Route::post('persoonlijke-instellingen/wachtwoord-wijzigen', 'PersonalSettingsController@store');

 	Route::resource('projects', 'Controllers\ProjectManagement\Leerling');
    Route::get('groepsinstellingen', 'GroupSettingsController@group_settings');
    Route::post('groepsinstellingen/opslaan', 'GroupSettingsController@store');
    
    Route::get('handleiding', 'GuideController@index');

    Route::resource('logboek',  'LogbookController');
});

Route::group(array('before' => array('auth', 'projectleider')), function(){

    Route::get('groepsinstellingen', 'GroupSettingsController@group_settings');
    Route::post('groepsinstellingen/opslaan', 'GroupSettingsController@store');
             
    Route::get('klantinstellingen/wijzig/{id}', 'CustomerSettingsController@customer_settings_edit');
    Route::get('klantinstellingen', 'CustomerSettingsController@customer_settings');
    Route::post('klantinstellingen/opslaan/{id}', 'CustomerSettingsController@store');
    
    Route::resource('projects', 'Controllers\ProjectManagement\Leerling');
    Route::get('handleiding', 'GuideController@index');

});

Route::group(array('before' => array('auth', 'docent'), 'prefix' => 'docent'), function(){
    Route::resource('projects', 'Controllers\ProjectManagement\DocentProjectManagement');
	Route::get('usersettings',  'UserSettingsController@index');
    Route::post('usersettings/edit',  'UserSettingsController@edit');
    Route::post('usersettings/save',  'UserSettingsController@save');
    Route::get('usersettings/create',  'UserSettingsController@create');
    Route::post('usersettings/create',  'UserSettingsController@save_new_user');
    Route::get('usersettings/delete',  'UserSettingsController@delete');
    Route::post('usersettings/delete',  'UserSettingsController@hard_delete');
	Route::post('usersettings/wachtwoord-wijzigen', 'UserSettingsController@changepassword');
	Route::resource('projects', 'Controllers\ProjectManagement\Docent');
    Route::resource('teacherlogbook', 'TeacherLogbookController');

    Route::resource('projects', 'Controllers\ProjectManagement\Docent');
    
    Route::get('projects/{projectId}/taken', array(
        'as' => 'docent.tasks.index', 'uses' => 'Controllers\TaskManagement\Docent@index' ));
    Route::get('projects/{projectId}/taken/create', array(
        'as' => 'docent.tasks.create', 'uses' => 'Controllers\TaskManagement\Docent@create' ));


    Route::get('projects/{projectId}/taken', array(
        'as' => 'docent.tasks.index',
        'uses' => 'Controllers\TaskManagement\Docent@index'));
    Route::get('projects/{projectId}/taken/create', array(
        'as' => 'docent.tasks.create',
        'uses' => 'Controllers\TaskManagement\Docent@create'));
    Route::get('projects/{projectId}/taken/edit/{$taskId}', array(
        'as' => 'docent.tasks.edit',
        'uses' => 'Controllers\TaskManagement\Docent@edit'));
});


Event::listen('illuminate.query', function($query){
	//var_dump($query);
});
