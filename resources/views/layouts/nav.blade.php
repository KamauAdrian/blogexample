<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="{{url('')}}">Home</a>
            <a class="blog-nav-item" href="{{route('reg-form')}}">Register</a>
            <a class="blog-nav-item" href="{{route('get-create')}}">Create</a>
            <a class="blog-nav-item" href="{{route('get-login')}}">Sign in</a>

            @if(Auth::check())
                <a class="blog-nav-item mr-auto" href="#">{{Auth::User()->name}}</a>
            @endif

        </nav>
    </div>
</div>