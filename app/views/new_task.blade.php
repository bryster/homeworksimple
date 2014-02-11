@extends('layouts.master')

@section('content')
    <h3> Post new task </h3>

    <div class="form-group">
    {{ Form::open( array( 'action' => 'tasks.store', 'files' => true )) }}  

        <input type="text" name="title" placeholder="Title" class="form-control">
         <br/> 
        
        <textarea name="content" placeholder="Content" class="form-control"></textarea><br/>
        
        <input type="text" name="price" placeholder="Price" class="form-control"> <br/>

        <input type="text" name="deadline" class="datepicker form-control" placeholder="Date Needed"> <br/> 

        <input type="file" name="attachments" /> <br/>

        <input type="hidden" name="user_id" value="{{Session::get('id');}}" >
        <button type="submit" name="post" class="btn btn-default pull-right">Post</button>
    {{ Form::close() }}
</div>

@stop