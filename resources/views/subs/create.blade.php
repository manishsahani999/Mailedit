@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="login-heading">
            <div class="title is-4 has-text-centered">
                {{ $list->name }}
                <span class="icon has-text-primary">
                     <i class="fas fa-chevron-right"></i>
                </span>
                subscriber
            </div>
        </div>
        <div class="login-body">
            <form action="{{ route('subs.store', $list->uuid) }}" method="post">
                @csrf
                <div class="field">
                    <div class="control">
                        <label class="label"> First Name
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                   class="input" required autofocus>
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="label"> Last name
                            <input type="text" class="input" value="{{ old('last_name') }}"
                                    name="last_name" required autofocus>
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="label"> Email
                            <input type="text" class="input" value="{{ old('email') }}"
                                    name="email" required>
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="label"> Phone
                            <input type="text" class="input" value="{{ old('phone') }}"
                                    name="phone" required>
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-medium login-btn is-primary">CREATE</button>
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