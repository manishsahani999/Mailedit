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
        <div class="login-body">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="email"
                           value="{{ old('email') }}" required autofocus
                           placeholder="Username or Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password"
                           value="{{ old('password') }}" required autofocus
                           placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="control">
                        <button type="submit" class="btn btn-primary login-btn">Login</button>
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
