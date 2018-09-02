@extends('layouts.master')
    @include('layouts.nav')
@section('content')
    <form class="form-horizontal" method="post" action="{{url('register')}}">
        @csrf
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">User Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="User Name">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password:</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Confirm Password:</label>
            <div class="col-sm-10">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign Up</button>
            </div>
        </div>
    </form>
    <div class="form-group">
        @include('layouts.errors')
    </div>
@endsection