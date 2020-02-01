<div class="nav-container nav-container--sidebar">
    <div class="nav-sidebar-column bg--dark">
        <div class="text-center text-block">
            <a href="{{ route('login') }}">
                <img alt="avatar" src="{{ asset('logo.png') }}" class="image--sm mt-5" />
            </a>
            <div class="text-center space--xs mt-4">
                <div>
                    <span class="type--fine-print type--fade">
                        MAILEDIT
                        <span class="update-year"></span>
                    </span>
                </div>
                <ul class="social-list list-inline list--hover ml-auto mt-3 mb-1 mr-auto">
                    <li>
                        <a class="text-white" href="mailto:">
                            <i class="socicon socicon-mail icon icon--xs"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://twitter.com/dtutimes">
                            <i class="socicon socicon-twitter icon icon--xs"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://www.facebook.com/dtutimes/">
                            <i class="socicon socicon-facebook icon icon--xs"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://www.instagram.com/dtu_times/?hl=en">
                            <i class="socicon socicon-instagram icon icon--xs"></i>
                        </a>
                    </li>
                </ul>
                <div class="text-center">
                    <span class="type--fade">
                        <small>
                            Got any issues? Contact the
                            <a href="" style="color: #F6F7F8;"> Developers.</a>
                        </small>
                    </span>
                </div>
            </div>
        </div>

        <div class="text-block">
            <h4 class="mb-0">
                <span data-tooltip="View or Edit your details."><a class="text-white" href="">{{ auth()->user()->name }}</a></span>
            </h4>
            <small>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="color: #F6F7F8;">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </small>
        </div>
        <div class="text-block">
            <ul class="menu-vertical">
                <li>
                    <a class="text-white" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="dropdown">
                    <span class="dropdown__trigger">
                            Brands
                        </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('brand.index') }}">
                                        All Brands
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('brand.create') }}">
                                        Create Brands
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <!--
                |
                |
                | Photographers Section
                |
                |
                 -->

                <!--
                |
                |
                | Superuser Section
                |
                |
                 -->



                <!--
                |
                |
                | Council Section
                |
                |
                 -->

            </ul>
        </div>
    </div>
    <div class="nav-sidebar-column-toggle visible-xs visible-sm" data-toggle-class=".nav-sidebar-column;active">
        <i class="stack-menu"></i>
    </div>
</div>
