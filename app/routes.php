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

Route::any('/register', array('as'=>'users.register', 'uses'=>'UsersController@register'));
Route::any('/login', 'SessionsController@login');
Route::get('/logout', 'SessionsController@logout');
Route::get('/tasks', 'TasksController@index');
Route::get('/task/{id}', 'TasksController@show')->where('id', '\d+');



Route::group(array('before' => 'sentryAuth'), function()
{
    Route::get('/new_task', array('as' => 'tasks.create', 'uses'=>'TasksController@create'));  
    Route::post('/new_task', array('as'=> 'tasks.store', 'uses'=>'TasksController@store'));  
    Route::resource('/users', 'UsersController');
    Route::get('/task/download/{filename}', 'TasksController@getDownload');
    Route::get('/task/{id}/bid/{bid_id?}', 'BidsController@show')->where('id', '\d+');
    Route::post('/task/bid', array('as'=>'bids.store', 'uses'=>'BidsController@store'));
    Route::get('/bid/{id}', array('as' => 'bids.show', 'uses'=> 'BidsController@show'));
    Route::post('/bid/{id}', array('as'=> 'comments.store', 'uses'=> 'CommentsController@store'));
    Route::post('/accept/{id}', array('as'=> 'bids.accept', 'uses'=>'BidsController@accept'));
    Route::post('/update_bid/{id}', array('as'=> 'bids.update', 'uses'=>'BidsController@update'));
    Route::get('/cancel/{id}', array('as'=> 'bids.cancel', 'uses'=>'BidsController@cancel'));
    Route::get('{username}', function($username){

        $user = User::whereUsername($username)->first();
        $id = $user->id;

        $task = new Task();

        $tasks = $task->userTask($id);
        
        return View::make('profile', compact('user', 'tasks'));
    });
});


