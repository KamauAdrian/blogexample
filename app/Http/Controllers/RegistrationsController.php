<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

        //sign in the new user

        auth()->login($user);


        //redirect to the home page
        return redirect('/');
    }
}
