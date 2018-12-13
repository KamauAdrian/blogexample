<?php

namespace App;

use Carbon\Carbon;
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
//    $this->comments()->create(compact('body'));

//the long method
Comment::create([
    'body'=>$body,
    'post_id'=>$this->id,
    'user_id'=>auth()->user()->id,
]);
}

//    public function scopeFilter($query,$filters){
//
//
//        if($month = $filters['month']){
//
//           $query->whereMonth('created_at',Carbon::parse($month)->month);
//
//       }
//        if($year = $filters['year']){
//
//            $query->whereYear('created_at',$year);
//
//        }
//
//    }



public static function archives()
{
    return static::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
        ->orderByRaw('min(created_at) desc')
        ->groupBy('year','month')->get()->toArray();


}
}
