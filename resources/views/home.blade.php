@extends('layouts.app')

@section('content')
<div class="wrap">

    <div class="home-header">
        <h2 class="inline-pc">Hello, {{ Auth::user()->name }}</h2>
        <div class="inline-pc right-pc">
            <a href="{{ route('brand.create') }}" class="btn btn-secondary bt">Create Brand</a>
        </div>
        <div class="mt-1">
            <span>Start your day off right with some account stats and recommendations.</span>
        </div>
    </div>

    <div class="home-body">
        <span id="body-tab">Overview</span>
        <hr class="mt-0"> 

        <h4>Campaign</h4>
        <div class="mt-2" id="home-section">
            <div class="row">
                <div class="col-sm-4 ml-1 t-right-pc">
                    <img class="mt-4" id="home-section-icon" src="{{ asset('img/paper-plane.svg') }}" alt="">
                </div>
                <div class="col-sm-4 ml-3">
                    <h5 class="mb-3">Create your first Campaign</h5>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                        Aliquid voluptates et quae, veniam quia autem in maxime esse 
                        assumenda, earum praesentium iure eius, voluptatem maiores 
                        deleniti adipisci officiis nisi ipsam!
                    </p>
                    <a href="{{ route('brand.create') }}" class="btn btn-warning bt">Create a brand</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
