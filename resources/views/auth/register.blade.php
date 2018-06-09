@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="login-heading">
            <div class="title is-2 has-text-centered">
                Mailed it
                <a href="{{ route('login') }}">
                    <span class="icon has-text-primary">
                     <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="login-body has-text-centered">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="field">
                    <div class="control">
                        <input type="text" class="input"
                               name="name" value="{{ old('name') }}"
                               required autofocus
                               placeholder="Username">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="text" class="input"
                               name="email" value="{{ old('email') }}"
                               required autofocus
                               placeholder="Email">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="password" class="input"
                               name="password" required autofocus
                               placeholder="Password">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input type="password" class="input"
                               name="password_confirmation" required autofocus
                               placeholder="Confirm Password">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-medium login-btn">Register</button>
                    </div>
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
