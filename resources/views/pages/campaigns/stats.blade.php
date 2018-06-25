@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">{{ ucwords($brand->brand_name) }}</h2>
            <h4 class="inline-pc">/ {{ $campaign->name }} / Stats</h4>
            <div class="mt-1"><span>lorem ipsum dolo sit.</span></div>
        </div>
        <div class="home-body">
            <span id="body-tab">Campaign Data</span>
            <hr class="mt-0">
        </div>
    </div>
@endsection