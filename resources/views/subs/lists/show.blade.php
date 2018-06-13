@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title is-inline">{{ $list->name }}</div>
            <div class="is-right">
                <a href="{{ route('subs.create', $list->uuid) }}" class="button is-dark">Add Subscriber</a>
            </div>
        </div>
        <div class="brand-body">

        </div>
    </div>
@endsection