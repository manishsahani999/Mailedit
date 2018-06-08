<nav class="navbar is-transparent">
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

    <div id="navbarExampleTransparentExample" class="navbar-menu">

        <div class="navbar-end m-r-1">
            <a class="navbar-item" href="">
                Home
            </a>
            @guest
                <a class="navbar-item" href="https://bulma.io/">
                    Home
                </a>
                <a class="navbar-item" href="https://bulma.io/">
                    Home
                </a>
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item dropdown-item" href="#">
                            Dashboard
                        </a>
                    </div>
                </div>
            @endguest
        </div>

    </div>
</nav>


<div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Left Side Of Navbar -->
<ul class="navbar-nav mr-auto">

</ul>

<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
<!-- Authentication Links -->
@guest
<li class="nav-item">
<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
@else
<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
 <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>
@endguest
</ul>
</div>
</div>
</nav>