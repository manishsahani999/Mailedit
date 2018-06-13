@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="login-heading">
            <div class="title has-text-centered">
                {{ $list->name }}
                <span class="icon has-text-primary">
                     <i class="fas fa-chevron-right"></i>
                </span>
                edit
            </div>
        </div>
        <div class="login-body">
            <form action="{{ route('subs.list.update', $list->uuid) }}" method="post">
                @csrf
                @method('PUT')
                <div class="field">
                    <div class="control">
                        <label class="label">
                            <input type="text" value="{{ $list->name }}" name="name"
                                   class="input" required>
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button login-btn" type="submit">Update</button>
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