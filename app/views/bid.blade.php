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
        <div class="panel panel-default">
              <!-- List group -->
              <ul class="list-group">

                
                    <li class="list-group-item"><a href="">{{ $bidder->username }}</a>  <span class="small" style="font-size: .8em;color:#999;">posted this 1 day ago</span> 
                        <div class="well" style="text-align:center;">
                         bids ${{ $bid->price }}
                        </div>
                    </li>

                    @if(!is_null($comments))
                    @foreach($comments as $comment)
                        <li class="list-group-item"><a href="">{{ $comment->user->username }}</a>  <span class="small" style="font-size: .8em;color:#999;">posted this 1 day ago</span> 
                        <div class="well" style="text-align:center;">
                         {{ $comment->comment }}
                        </div>
                    </li>
                    @endforeach
                    @endif


                    
              </ul>
        </div>
    @if(Session::get('id')==$bid->bidders_id || Session::get('id') == $task->user_id)
        {{ Form::open( array( 'action' => 'comments.store' )) }}  
            <input type="hidden" name="bid_id" value="{{$bid->id}}">
            <input type="hidden" name="user_id" value="{{Session::get('id')}}">
            <textarea class="form-control" name="comment"></textarea>
            <br/>
            <button type="submit" name="submit" class="btn btn-default pull-right">Comment</button>
        {{ Form::close() }}
    @endif
@stop