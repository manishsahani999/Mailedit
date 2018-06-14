@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="login-heading text-center">
            <h2>
                Mailed it
                <a href="{{ route('login') }}">
                    <span class="icon has-text-primary">
                     <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </h2>
        </div>
        <div class="login-body has-text-centered">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                        <input type="text" class="form-control"
                               name="name" value="{{ old('name') }}"
                               required autofocus
                               placeholder="Username">
                </div>
                <div class="form-group">
                        <input type="text" class="form-control"
                               name="email" value="{{ old('email') }}"
                               required autofocus
                               placeholder="Email">
                </div>
                <div class="form-group">
                        <input type="password" class="form-control"
                               name="password" required autofocus
                               placeholder="Password">
                </div>
                <div class="form-group">
                        <input type="password" class="form-control"
                               name="password_confirmation" required autofocus
                               placeholder="Confirm Password">
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary login-btn">Register</button>
                </div>
            </form>
            @if ($errors->any())
                <div class="has-text-danger login-errors" style="margin-left: 0;">
                    <ul style="list-style-type: none">
                        @foreach ($errors->all() as $error)
                            <li style="margin-left: -1.5em">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
