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
//        return redirect('user/login');
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
       $posts = Post::paginate(5);
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
        $post = new  Post();
        $post->user_id=auth()->user()->id;
        $post->title=request('title');
        $post->body=request('body');
        if($request->has('img')){
            $file = $request->file('img');

            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['path']=$name;
            $post->path = $name;
        }
        $post->save();



//      $post =  auth()->user()->publish(new Post(request([
//                'title',
//                'body'
//            ])));


//redirect to the home page

        return redirect('/');
//        if ($post==true){
//
//        }else{
//            return redirect()->back()->withErrors('message','Could not create post kindly try again');
//        }

    }
    public function show(post $post){
       return view('posts.show',compact('post'));
    }
    public function edit(post $post){

        return view('posts.edit',compact('post'));
    }
    public function update(Request $request,$id){
        $post = post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return redirect('/')->with('success','Post Updated Successfully');
    }
    public function destroy(Post $post){


//        unlink(public_path() .$post->);

        $post->delete();

        return redirect('/')->with('message','Post deleted Successfully');
    }
}
