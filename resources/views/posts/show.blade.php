@extends('layouts.master')
@section('navbar')
@include('layouts.nav')
@endsection
@section('content')
    <hr>

        <div>
<h1>{{$post->title}}</h1>
    {{$post->body}}
        </div>
        <div>

            <button class="btn btn-default" type="button">
                <a href="{{$post->id}}/delete">Delete post</a>
            </button>

            <button class="btn btn-default" type="button">
                <a href="{{$post->id}}/edit">Edit post</a>
            </button>

        </div>
<hr>
<div class="comments">
    <ul class="list-group">
    @foreach($post->comments as $comment)
        <li class="list-group-item">
            <strong>{{$comment->created_at->diffForHumans()}}:</strong> {{$comment->body}}
        </li>
    @endforeach
    </ul>
</div>
<div class="card">
    <div class="card-block">
        <form method="post" action="{{$post->id}}/comments">
            @csrf
            <div class="form-group">
                <textarea name="body" id="body" class="form-control" placeholder="Your Comments here"></textarea>
            </div>
            <div class="form-group">
                <div class="">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </div>
        </form>
        @include('layouts.errors')
    </div>
</div>
@endsection