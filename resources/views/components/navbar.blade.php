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
                    <div class="navbar-dropdown is-boxed is-right">
                        <a class="navbar-item dropdown-item" href="#">
                            Dashboard
                        </a>
                    </div>
                </div>
            @endguest
        </div>

    </div>
</nav>
