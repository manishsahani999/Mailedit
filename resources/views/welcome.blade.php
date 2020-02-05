@extends('layouts.app')

@section('content')

<section class="text-center space--lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h6 class="type--uppercase">Mailedit </h6>
                <div class="typed-headline">
                    <span class="h1 inline-block">The template for</span>
                    <span class="h1 inline-block typed-text typed-text--cursor color--primary" data-typed-strings="bootstrapped startups.,marketing sites., portfolios.,blogging.,rapid development.,small business.,showcasing products., the design conscious."></span>
                </div>
                <p class="lead">
                    A robust, multipurpose template built with modularity at the core.
                </p>
                @guest
                <a class="btn btn--sm type--uppercase inner-link" href="{{ route('register') }}">
                    <span class="btn__text">
                        Register
                    </span>
                </a>
                <a class="btn btn--sm type--uppercase inner-link" href="{{ route('login') }}">
                    <span class="btn__text">
                    Login
                    </span>
                </a>
                @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">
                        {{ Auth::user()->name }}
                    </a>
                </div>
                @endguest
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

@endsection