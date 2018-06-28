@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="login-heading text-center">
            <h4 class="title">
                {{ $list->name }}
                <span class="text-primary">
                     <i class="fas fa-chevron-right"></i>
                </span>
                subscriber
            </h4>
        </div>
        <div class="login-body">
            <form action="{{ route('subs.store', $list->uuid) }}" method="post">
                @csrf
                <div class="form-group">
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="form-control" placeholder="First Name" required autofocus>
                </div>
                <div class="form-group">
                        <input type="text" class="form-control" value="{{ old('last_name') }}"
                                name="last_name" placeholder="Last Name" required autofocus>
                </div>
                <div class="form-group">
                        <input type="text" class="form-control" value="{{ old('email') }}"
                                name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                        <input type="text" class="form-control" value="{{ old('phone') }}"
                                name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group">
                    <div class="control">
                        <button type="submit" class="btn login-btn btn-primary">CREATE</button>
                    </div>
                </div>
            </form>
            @include('components.errors')
        </div>
    </div>
@endsection