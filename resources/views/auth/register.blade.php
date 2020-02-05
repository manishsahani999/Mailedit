@extends('layouts.app')

@section('content')

<section class="imageblock switchable feature-large height-100">
    <div class="imageblock__content col-lg-6 col-md-4 pos-right">
        <div class="background-image-holder" style="background: url('https://images.pexels.com/photos/439818/pexels-photo-439818.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'); opacity: 1;">
            <img alt="image" src="https://images.pexels.com/photos/439818/pexels-photo-439818.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
        </div>
    </div>
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-lg-5 col-md-7">
                <h1 class="font-nunito" style="font-size: 4rem;">Mailedit <span class="type--fade">| Register </span></h1>
                <span class="h2 countdown color--primary" data-date="09/25/2018" data-fallback-text="Getting ready"></span>
                <p class="lead">Grow your business with our state of the art blah blah blah. </p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                name="name" value="{{ old('name') }}"
                                required autofocus
                                placeholder="Username">
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                name="email" value="{{ old('email') }}"
                                required autofocus
                                placeholder="Email">
                    </div>
                    <div class="form-group">
                            <input type="password" class="form-control form-control-lg"
                                name="password" required autofocus
                                placeholder="Password">
                    </div>
                    <div class="form-group">
                            <input type="password" class="form-control form-control-lg"
                                name="password_confirmation" required autofocus
                                placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary register-btn">Get Started</button>
                    </div>
                </form>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

@endsection
