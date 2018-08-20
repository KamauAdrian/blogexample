<?php

namespace App\Http\Controllers;

use App\Post;
//use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationsController extends Controller
{
    public function __construct()
    {
    $this->middleware('guest');
    }

    public function index(){
        return view('users.register');
    }
    public function store(){
        //validate the form
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);

        //create new user
        $user=User::create(request(['name','email','password']));

        session()->flash('message','Thank You for registering with us');

        //sign in the new user

        auth()->login($user);

//Mail::to($user)->send(new Welcome($user));
        //redirect to the home page
        return redirect('/');
    }
}
