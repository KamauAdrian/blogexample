<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(post $post){


        $this->validate(request(),['body'=>'required|min:2']);


//        auth()->user()->comment(new Comment(request([
//            'body',
//        ])));
        $post->addcoment(request('body'));
        return back();
    }
}
