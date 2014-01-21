@extends('layouts.master')

@section('content')

<h1>Login</h1>

<div class="form-group">
    {{ Form::open( array( 'action' => 'UsersController@login' )) }}  
        
        <input type="email" name="email" class="form-control" placeholder="Email"> <br/> 

        <input type="password" name="password" placeholder="Password" class="form-control" > <br/>
        
        <button type="submit" name="login" class="btn btn-default pull-right">Login</button>
    {{ Form::close() }}
</div>
@stop