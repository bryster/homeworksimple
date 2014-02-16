@extends('layouts.master')

@section('content')
 {{ Form::open( array('action' => 'bids.store')) }}
        <input type="text" placeholder="Place your bid here!" class="form-control input-lg" name="price"><br/>
        <input type="hidden" name="task_id" value="{{ $task->id }}">
        <input type="hidden" name="bidders_id" value="{{ Session::get('id') }}">
        <button type="submit" name="bid" class="btn btn-primary btn-lg btn-block">Bid!</button>
     {{ Form::close() }}
    

@stop