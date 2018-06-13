@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title is-inline">{{ $list->name }}</div>
            <div class="is-right">
                <a href="{{ route('subs.create', $list->uuid) }}" class="button is-dark">Add Subscriber</a>
            </div>
        </div>
        <hr class="m-t-2">
        <div class="brand-body columns is-flex-wrap">
            @foreach($subs as $sub)
                <div class="notification is-white box column is-2">
                    <div>
                        <a class="has-text-primary decoration-none" href="{{ route('subs.show', [
                                'uuid'  => $list->uuid,
                                'email' => $sub->email
                            ]) }}">
                            {{ ucwords($sub->first_name.' '.$sub->last_name ) }}
                        </a>
                    </div>
                    <div class="m-b-1">{{ ucwords($sub->email) }}</div>
                    <div><a href="" class="button is-dark is-small">Delete</a></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection