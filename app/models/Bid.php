<?php 

class Bid extends Eloquent{

    public function user()
    {   
        return $this->belongsTo('User', 'bidders_id');
    }

    public function task()
    {
        return $this->belongsTo('Task', 'task_id');
    }

    public function comment()
    {
        return $this->hasMany('Comment', 'bid_id');
    }
}