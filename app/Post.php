<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'title',
        'body'

    ];


public function user(){
    return $this->belongsTo('App\User');
}
public function comments(){
    return $this->hasMany('App\Comment');
}

    public function addcoment($body){
        $this->comments()->create(compact('body'));

//the long method
//Comment::create([
//    'body'=>$body,
//    'post_id'=>$this->id,
//    'user_id'=>$this->id,
//]);
    }


}
