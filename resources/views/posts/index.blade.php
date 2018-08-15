@extends('layouts.master')
@section('navbar')
    @include('layouts.nav')
@endsection
@section('content')

@foreach($posts as $post)
    @include('posts.post')
    @endforeach

    <nav>
        <ul class="pager">
            <li><a href="#">Previous</a></li>
            <li><a href="#">Next</a></li>
        </ul>
    </nav>
@endsection