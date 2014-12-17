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

Route::get('eenmalige-gegevens','enteronetimedataController@showWelcome');

Route::get('dashboard', array('before' => 'auth', 'uses' => 'dashboardController@showWelcome'));

Route::resource('projects', 'ProjectManagementController', array('before' => 'auth'));
Event::listen('illuminate.query', function($query){
	//var_dump($query);
});

Route::get('persoonlijke-instellingen', array('before' => 'auth', 'uses' => 'personalSettingsController@index'));
//Route::post('persoonlijke-instellingen/opslaan', array('before' => 'auth', 'uses' => 'personalSettingsController@store'), function(){
//    Auth::post('opslaan');
//    return Redirect::to('persoonlijke-instellingen');
//});

Route::post('persoonlijke-instellingen/opslaan', function(){
        
        // create the validation rules ------------------------
        $rules = array(
            'first_name'       => 'required', 						// just a normal required validation
            'last_name'        => 'required', 	                    // just a normal required validation
            'phone_number'     => 'required'                        // just a normal required validation
            //'password'         => 'required',
            //'password_confirm' => 'required|same:password' 		// required and has to match the password field
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages('Er is iets fout gegaan');

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('persoonlijke-instellingen')
                ->withErrors($validator);

        } else {
                        
            // validation successful ---------------------------

            // our duck has passed all tests!
            // let him enter the database

            // create the data
            $user_data = User::find(Auth::id());
            $user_data->first_name       = Input::get('first_name');
            $user_data->last_name        = Input::get('last_name');
            $user_data->phone_number     = Input::get('phone_number');
            //$duck->password = Hash::make(Input::get('password'));

            // save our data
            $user_data->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            return Redirect::to('persoonlijke-instellingen');

        }
    });
