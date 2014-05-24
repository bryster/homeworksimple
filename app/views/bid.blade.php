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

        <!-- Check if user is bidder or poster -->
        @if(Session::get('id')==$bid->bidders_id || Session::get('id') == $task->user_id)

            @if(Session::get('id')== $task->user_id && $bid->status == 0 )
                <div class="row">
                    {{ Form::open(array('action'=> 'bids.accept')) }}
                        <input type="hidden" name="bid_id" value="{{ $bid->id }}">
                        <button type="submit" name="accept" class="btn btn-primary pull-right">Accept</button>
                    {{ Form::close() }}
                </div>
                <br/>
            @elseif( $bid->status == 1 )
                <div class="row">
                    <p class="pull-right"> Accepted at {{$bid->updated_at}} <a href="../cancel/{{$bid->id}}" class="btn btn-warning">Cancel</a></p>
                </div>
            @elseif(Session::get('id') == $bid->bidders_id)
                <div class="row">
                    {{ Form::open(array('action'=> 'bids.update')) }}
                        <input type="hidden" name="bid_id" value="{{ $bid->id }}">
                        <input type="text" name="price" class="form-control">
                        <button type="submit" name="update" class="btn btn-primary pull-right">Update Bid</button>
                    {{ Form::close() }}
                </div>
                <br/>
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

                        {{ Form::open( array( 'action' => 'comments.store' )) }}  
                            <input type="hidden" name="bid_id" value="{{$bid->id}}">
                            <input type="hidden" name="user_id" value="{{Session::get('id')}}">
                            <textarea class="form-control" name="comment"></textarea>
                            <br/>
                            <button type="submit" name="submit" class="btn btn-default pull-right">Comment</button>
                        {{ Form::close() }}
                    @else
                        <div class="alert alert-warning">Only the owner and the bidder of this task are allowed to view.</div>
                    @endif
@stop