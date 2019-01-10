@extends('layouts.master')
    @include('layouts.nav')
@section('content')
    <a href="{{route('get-create')}}">
        <button class="btn btn-info btn-lg">New Post</button>
    </a>

@foreach($posts as $post)
    @include('posts.post')
@endforeach

    {{--<nav>--}}
        {{--<ul class="pager">--}}
            {{--<li><a href="#">Previous</a></li>--}}
            {{--<li><a href="#">Next</a></li>--}}
        {{--</ul>--}}
    {{--</nav>--}}


        {{ $posts->links() }}

@endsection