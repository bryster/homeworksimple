@extends('layouts.master')

@section('content')

<div class="page-header">
  <h1><small>Welcome back {{ $user->username }}</small></h1>
</div>
<div class="panel panel-default">
  <div class="panel-heading">To Do</div>
  <div class="panel-body">
    You got nothing to do.
  </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Your Posts <span class="col-md-offset-9"><a href="new_task">New task</a></span></div>
    <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item"> 

                <div class="row"> 
                    <div class="col-md-10"><b><a href="task/{{$task->id}}">{{ $task->title  }}</b></a></div>
                    <div class="col-md-2"><small>${{ $task->price  }}</small></div>                
                </div>

                <div class="row">
                    <div class="col-md-10">{{ $task->content  }}</div>
                    <div class="col-md-10" style="text-align:right;"></div>
                </div>
                </li>
            @endforeach
        </ul>
        
</div>

@stop