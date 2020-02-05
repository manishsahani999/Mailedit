<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111767284-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-111767284-1');
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mailedit @yield('title')</title>

    <!-- Animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('links')
    

</head>
<body>
    <div id="app">
        @auth
            @include('inc.sidebar')
        @endauth
        <div class="main-container">
            @include('inc.session')
            @include('inc.errors')
            @yield('content')
        </div>
    </div>
    <a class="back-to-top inner-link" href="#app" data-scroll-class="100vh:active">
        <i class="stack-interface stack-up-open-big"></i>
    </a>

        {{-- Theme Scripts --}}
        <script src="{{ asset('js/app/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/app/flickity.min.js') }}"></script>
        <script src="{{ asset('js/app/easypiechart.min.js') }}"></script>
        <script src="{{ asset('js/app/parallax.js') }}"></script>
        <script src="{{ asset('js/app/typed.min.js') }}"></script>
        <script src="{{ asset('js/app/datepicker.js') }}"></script>
        <script src="{{ asset('js/app/isotope.min.js') }}"></script>
        <script src="{{ asset('js/app/ytplayer.min.js') }}"></script>
        <script src="{{ asset('js/app/lightbox.min.js') }}"></script>
        <script src="{{ asset('js/app/granim.min.js') }}"></script>
        <script src="{{ asset('js/app/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('js/app/countdown.min.js') }}"></script>
        <script src="{{ asset('js/app/twitterfetcher.min.js') }}"></script>
        <script src="{{ asset('js/app/spectragram.min.js') }}"></script>
        <script src="{{ asset('js/app/smooth-scroll.min.js') }}"></script>
        <script src="{{ asset('js/app/scripts.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('.tab__content section.switchable').mouseenter(function () {
                    $(this).append('<div class="switchable-toggle label">Switch Sides</div>');
                });
                $('.tab__content section.switchable').mouseleave(function () {
                    $(this).find('.switchable-toggle').remove();
                });
                $(document).on('click', '.switchable-toggle', function () {
                    $(this).closest('section').toggleClass('switchable--switch');
                });
            });
        </script>

        {{-- Page Scripts --}}
        @yield('scripts')
</body>
</html>
