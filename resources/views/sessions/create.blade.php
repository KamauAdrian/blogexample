@extends('layouts.master')
@section('navbar')
    @include('layouts.nav')
@endsection
@section('content')
    <h2>Sign In</h2>
    <form action="{{url('login')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-default">Sign In</button>
        </div>
    </form>
    @include('layouts.errors')
@endsection