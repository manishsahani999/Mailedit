@extends('layouts.app')

@section('content')

<section class="imageblock switchable feature-large height-100">
    <div class="imageblock__content col-lg-6 col-md-4 pos-right">
        <div class="background-image-holder" style="background: url('https://images.pexels.com/photos/1078958/pexels-photo-1078958.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'); opacity: 1;">
            <img alt="image" src="https://images.pexels.com/photos/1078958/pexels-photo-1078958.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
        </div>
    </div>
    <div class="container pos-vertical-center">
        <div class="row">
            <div class="col-lg-5 col-md-7">
                <h1 class="font-nunito" style="font-size: 4rem;">Mailedit <span class="type--fade">| Login </span></h1>
                <span class="h2 countdown color--primary" data-date="09/25/2018" data-fallback-text="Getting ready"></span>
                <p class="lead">Grow your business with our state of the art blah blah blah. </p>
                <form action="{{ route('login') }}" method="post">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control form-control-lg" name="password" value="{{ old('password') }}" required autofocus placeholder="Password">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary btn-dark type--uppercase">
                                <span class=" btn__text text-white">Login</span>
                            </button>
                        </div>
                        <div class="col-12">
                            <span class="type--fine-print">By signing up, you agree to the
                                <a href="#">Terms of Service</a>
                            </span>
                        </div>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true">
                            <input type="text" name="b_77142ece814d3cff52058a51f_f300c9cce8" tabindex="-1" value="">
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

@endsection