<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index(){

//       $posts = Post::latest()->filter(['month','year'])->get();
       $posts = Post::latest();

       if($month = request('month')){

           $posts->whereMonth('created_at',Carbon::parse($month)->month);

       }
        if($year = request('year')){

            $posts->whereYear('created_at',$year);

        }
       $posts = $posts->get();
//return $archives;

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
    public function edit(post $post){

        return view('posts.edit',compact('post'));
    }
    public function update(Request $request,$id){
        $post=Post::find($id);

        $post->update($request->all());

        return redirect()->home();
    }
    public function destroy(post $post){

        $post->delete();

        return redirect()->home();
    }
}
