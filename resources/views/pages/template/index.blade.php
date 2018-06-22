@extends('layouts.app')


@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">Templates</h2>
            <div class="right-pc">
                <a href="{{ route('template.create') }}" class="btn btn-dark bt">Create and design a new Template</a>
            </div>
            <div class="mt-1">
                <span>Template make your email more powerful.</span>
            </div>
            @include('components.sessions')
        </div>
        <div class="home-body">
            <span id="body-tab">All templates</span>
            <hr class="mt-0">
        </div>
    </div>
@endsection