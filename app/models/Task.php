<?php 

class Task extends Eloquent{

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
    
    public function userTask($id)
    {
        return DB::table('tasks')->where('user_id', $id)->get();
    }

    public function bid()
    {
        return $this->hasMany('Bid');
    }
}