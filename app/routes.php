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

Route::get('/', function(){
    return View::make('index');
});

// Route::get('/tasks', function(){
//     return Task::with('user')->get();
// });

Route::group(array('prefix' => 'service'), function() {
    Route::resource('authenticate', 'AuthenticateController');
});


 Route::get('/task/{id?}', 'TasksController@index');
 Route::post('task', 'TasksController@store');
 Route::put('task/{id}', 'TasksController@update');
 Route::delete('task/{id}', 'TasksController@destroy');



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
// Route::get('/tasks', 'TasksController@index');
Route::get('/task/{id}', 'TasksController@show')->where('id', '\d+');



Route::group(array('before' => 'sentryAuth'), function()
{
    Route::get('/new_task', array('as' => 'tasks.create', 'uses'=>'TasksController@create'));  
    //Route::post('/new_task', array('as'=> 'tasks.store', 'uses'=>'TasksController@store'));  
    Route::resource('/users', 'UsersController');
    Route::get('/task/download/{filename}', 'TasksController@getDownload');
    Route::get('/task/{id}/bid/{bid_id?}', 'BidsController@show')->where('id', '\d+');
    Route::post('/task/bid', array('as'=>'bids.store', 'uses'=>'BidsController@store'));

    Route::get('{username}', function($username){

        $user = User::whereUsername($username)->first();
        $id = $user->id;

        $task = new Task();

        $tasks = $task->userTask($id);
        
        return View::make('profile', compact('user', 'tasks'));
    });
});


