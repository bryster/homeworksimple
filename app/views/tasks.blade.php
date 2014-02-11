@extends('layouts.master')

@section('content')
    <h3> Tasks </h3>

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
    {{ $tasks->links(); }}
@stop