<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationsController extends Controller
{
    public function index(){
        return view('users.register');
    }
    public function store(){
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);
        //create new user
        $user=User::create(request(['name','email','password']));
        //redirect to the home page
        return redirect('/');
    }
}
