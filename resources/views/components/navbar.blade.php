<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand m-l-1" href="/">
            <span id="navbar-text">mailedit</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Register<span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        Login
                    </a>
                </li>

            @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Subscribers
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('subs.list.index') }}">
                            All Lists
                        </a>
                    </div>
                </li>
                <li class="mt-auto mb-auto">
                    <a href="" class="btn btn-info bt">
                        Create brand
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mr-1" aria-labelledby="navbarDropdown">
                        <h6 class="dropdown-header">Menu</h6>
                        <a class="dropdown-item" href="{{ url('/home') }}">
                            Dashboard
                        </a>
                        <hr class="m-b-0 m-t-0">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

    </div>
</nav>
