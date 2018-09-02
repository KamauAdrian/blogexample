<nav class="navbar navbar-expand-md navbar-light navbar-laravel blog-main">
    <div class="container">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="mainnavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
            {{--left side of the navbar--}}
        <div class="collapse navbar-collapse" id="mainnavbar">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item"><a class="nav-link active" href="{{url('')}}">Home</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{route('get-create')}}">Blog</a></li>

            </ul>
        {{--right side of the nav bar--}}
                <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('get-login') }}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reg-form') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user-logout') }}"
                                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('user-logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </div>
                            </li>
                        @endguest
                </ul>
        </div>
    </div>
</nav>