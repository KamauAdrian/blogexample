<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post){

//validate the comment
        $this->validate(request(),['body'=>'required|min:2']);


        //create the comment
$comment = new Comment();
$comment->body=request('body');
$comment->post_id=$post->id;
$comment->user = auth()->user()->name;
$comment->save();





//        auth()->user()->addcomment(new Post(request([
//            'body'
//        ])));

        //redirect

//        $post->addcoment(request('body'));
        return back();

//        ->with('message','Comment added successfully ');
    }
}
