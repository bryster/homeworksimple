<?php 

class Comment extends Eloquent{

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function bid()
    {
        return $this->belongsTo('Bid', 'bid_id');
    }
}