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

Route::filter('sentryAuth', function(){
    //check if logged in or not
    if( !Sentry::check() ){
        return Redirect::intended('/login');
    }
    else{

    }
});

Route::any('/register', 'UsersController@create');
Route::any('/login', 'SessionsController@login');
Route::get('/logout', 'SessionsController@logout');

Route::group(array('before' => 'sentryAuth'), function()
{
    Route::resource('/users', 'UsersController');
});


