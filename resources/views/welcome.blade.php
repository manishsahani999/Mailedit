<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mailed it</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    </head>
    <body>
        <div class="app">
            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-end">
                    @guest
                        <a class="navbar-item" href="">
                            Home
                        </a>
                        <a class="navbar-item" href="" >
                            Home
                        </a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="navbar-dropdown is-boxed">
                                <a class="navbar-item" href="#">
                                    lorem
                                </a>
                            </div>
                        </div>
                    @endguest
                </div>
            </nav>
            <div class="welcome">
                Mailed it
                <a href="{{ route('login') }}">
                    <span class="icon has-text-primary" style="margin-left: 10px;">
                     <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>
        {{--scripts--}}
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
