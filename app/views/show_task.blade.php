@extends('layouts.master')

 @section('content')

 <div class="col-md-9">
    <h1>{{ $task->title }}</h1>
    <article>
        {{ $task->content }}
    </article>
    <p>
        @if($task->attachments != NULL)
            <a href="download/{{$task->attachments}}" class="btn btn-large"> Download Files </a>
        @endif
    </p>
    <p> {{ link_to('/tasks', 'Go back') }}</p>

    <article>
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Bids</div>

          <!-- List group -->
          <ul class="list-group">
            <li class="list-group-item">
            <h2 style="margin-top: 0px;margin-bottom:15px;"><span class="label label-default" style="color:black;">$250</span> <small><button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#userInfo">jbryllec</button></small> 

            <span class="pull-right"><button type="button" class="btn btn-link" id="toggle">View Bid</button></span></h2>
            </li>

            <li class="list-group-item">
            <h2 style="margin-top: 0px;margin-bottom:15px;"><span class="label label-default" style="color:black;">$250</span> <small><button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#userInfo">jbryllec</button></small> 

            <span class="pull-right"><button type="button" class="btn btn-link" id="toggle">View Bid</button></span></h2>
            <a href="{{$task->id}}/bid/1">View</a>
            </li>
          </ul>
        </div>
    </article>
</div>


<!-- Side Bar -->
<div class="col-md-3">
    <p>
         @if(Session::get('id')!=$task->user->id)
    {{ Form::open( array('action' => 'bids.store')) }}
        <input type="text" placeholder="Place your bid here!" class="form-control input-lg" name="price"><br/>
        <input type="hidden" name="task_id" value="{{ $task->id }}">
        <input type="hidden" name="bidders_id" value="{{ Session::get('id') }}">
        <button type="submit" name="bid" class="btn btn-primary btn-lg btn-block">Bid!</button>
     {{ Form::close() }}
    </p>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row" style="text-align:center;">
                <div class="col-md-5"><h4>$250</h4> Average bid</div>
                <div class="col-md-2" style="text-valign:middle;"><br/>by</div>
                <div class="col-md-5"><h4>5</h4> Bidders</div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    This will be due on {{ $task->deadline }}
                </div>
            </div>
        </div>
    </div>
    @endif    
</div>


<!-- Modal -->
<div class="modal fade" id="userInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><center>Profile Summary</center></h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:center;">
            <div class="col-md-4">Rating<br/>
                <h3>5/5</h3>
            </div>
            <div class="col-md-4">Tasks completed<br/>
                <h3>4</h3>
            </div>
            <div class="col-md-4">Earned <br/>
                <h3>$100</h3>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Go to profile</button>
      </div>
    </div>
  </div>
</div>

 @stop