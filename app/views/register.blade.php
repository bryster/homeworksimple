@extends('layouts.master')

@section('content')

<h1>Sign Up</h1>

<div class="form-group">
    {{ Form::open( array( 'route' => 'users.store' )) }}  

        <input type="text" name="username" placeholder="Username" class="form-control">
         <br/> 
        
        <input type="password" name="password" placeholder="Password" class="form-control" > <br/>
        
        <input type="password" name="retype_password" placeholder="Password" class="form-control"> <br/>

        <input type="email" name="email" class="form-control" placeholder="Email"> <br/> 
        <button type="submit" name="signup" class="btn btn-default pull-right">Sign up</button>
    {{ Form::close() }}
</div>
@stop