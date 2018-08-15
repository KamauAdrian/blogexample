<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(){
       $posts = Post::latest()->get();
//       $posts = Post::all();

       return view('posts.index',compact('posts'));
   }
   public function create(){

       return view('posts.create');
//       return view('sessions.create');
//       return view('users.register');
   }

    public function store(request $request){
//dd(request()->all());
$this->validate(request(),[
    'title'=>'required',
    'body'=>'required'
]);
//create a new post
        auth()->user()->publish(new Post(request([
                'title',
                'body'
            ])));

//redirect to the home page
        return redirect()->home();
    }
    public function show(post $post){
       return view('posts.show',compact('post'));
    }
}
