@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">Template/</h2>
            <h5 class="inline-pc">{{ $template->name }}</h5>
            <div class="right-pc"><a href="{{ route('template.edit', $template->uuid) }}" class="btn btn-dark bt">Edit this template</a></div>
        </div>
        <div class="home-body">
            <span id="body-tab">Template</span>
            <hr class="mt-0">
            <div class="template-show-wrap p-1">
                {!! $template->content !!}
            </div>
        </div>
    </div>
@endsection