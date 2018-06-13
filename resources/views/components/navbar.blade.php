<nav class="navbar is-transparent has-shadow">
    <div class="navbar-brand m-l-1">
        <a class="navbar-item navbar-logo" href="/">
            Mailed it
            <span class="icon has-text-primary" style="margin-left: 10px;">
             <i class="fas fa-chevron-right"></i>
            </span>
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="navbar-menu">

        <div class="navbar-end m-r-1">
            @guest
                <a class="navbar-item" href="{{ route('register') }}">
                    Register
                </a>
                <a class="navbar-item" href="{{ route('login') }}">
                    Login
                </a>
            @else
                <a class="navbar-item" href="{{ url('/home') }}">
                    Home
                </a>
                <a class="navbar-item" href="{{ route('subs.list.index') }}">
                    Subscribers
                </a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="navbar-dropdown is-boxed is-right">
                        <a class="navbar-item dropdown-item" href="{{ url('/home') }}">
                            Dashboard
                        </a>
                        <a class="navbar-item dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endguest
        </div>

    </div>
</nav>
