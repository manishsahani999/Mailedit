@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="login-heading m-t-2">
            <h4 class="title text-center">
                {{ $list->name }}
                <span class="icon has-text-primary">
                     <i class="fas fa-chevron-right"></i>
                </span>
                edit
            </h4>
        </div>
        <div class="login-body">
            <form action="{{ route('subs.list.update', $list->uuid) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                        <input type="text" value="{{ $list->name }}" name="name"
                               class="form-control" placeholder="Name" required>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="btn login-btn btn-primary    " type="submit">Update</button>
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