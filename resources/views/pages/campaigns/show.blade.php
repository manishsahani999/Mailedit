@extends('layouts.app')

@section('links')

@endsection

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">{{ucwords($campaign->name) }}</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
                <!-- <a class="" href="{{ route('brand.create') }}">
                    <span class="btn__text text-white">Create New Brand</span>
                </a> -->
            </div>
        </div>
    </div>
</section>

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <span class="h4 mb-4">Campaign List</span>
                <form action="{{ route('campaign.remove.lists', [
                                            'slug' => $brand->slug,
                                            'uuid' => $campaign->uuid
                                    ]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-select">
                            <select class="form-control form-control-lg" name="lists">
                                @foreach($campaign->binarySubsList as $list)
                                <option value="{{ $list->id }}">{{ $list->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-dark type--uppercase">Remove list</button>
                    </div>
                </form>
            </div>
            @php 
                $selected_list = [];
                foreach($campaign->binarySubsList as $list) 
                {
                    array_push($selected_list, $list->id);
                }
            @endphp
            <div class="col-md-3">
                <span class="h4 mb-4">All list</span>
                <form action="{{ route('campaign.add.lists', [
                            'slug' => $brand->slug, 
                            'uuid' => $campaign->uuid
                        ]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-select">
                            <select class="form-control form-control-lg" name="lists">
                                @foreach($lists as $list)
                                @if (!in_array($list->id, $selected_list))
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-dark type--uppercase">Add List</button>
                </form>
            </div>
            <div class="col-md-4">
                <h3 class="mb-3">Test Send this Campaign</h3>
                <form action="{{ route('email.test', [
                                    'slug' => $brand->slug,
                                    'uuid' => $campaign->uuid
                            ]) }}" method="post" style="margin-top: 0 !important;">
                    @csrf
                    <div class="form-group" class="mt-2">
                        <input type="text" name="test_email" class="form-control form-control-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-dark type--uppercase">Send this newsletter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection



<!-- 

<nav class="navbar navbar-expand-lg sec-navbar navbar-light bg-light sticky-top">
    <div class="navbar-item ml-5">
        <img src="{{ asset('img/email_sec.png') }}" alt="">
        <span class="ml-2">Let's get started</span>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a href="{{ route('brand.show', $brand->slug) }}" class="btn bt"> Go back all Campaigns</a>
        </li>
        <li class="navbar-item">
            <a class="btn btn-warning bt" href="{{ route('campaign.content.create', [$brand->slug, $campaign->uuid]) }}">Edit Design</a>
        </li>
        <li class="navbar-item ml-1">
            <a class="btn btn-warning bt" href="{{ route('campaign.edit', [$brand->slug, $campaign->uuid]) }}">Edit info</a>
        </li>
        <li class="navbar-item ml-1">
            <a href="#schedule" class="btn btn-primary bt" name="draft">Schedule</a href="#schedule">
        </li>
        <li class="navbar-item ml-1">
            @if(count($campaign->binarySubsList) == 0)
                <button class="btn btn-info bt" disabled>Send now</button>
            @else
            <form action="{{ route('campaign.send', $campaign->uuid) }}" method="get">
            @csrf
                    <button class="btn btn-info bt">Send now</button>
            </form>
            @endif
        </li>
    </ul>
</nav>
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">{{ $brand->brand_name }}</h2>
            <h4 class="inline-pc mt-1">
                / / Designing / Schedule
            </h4>
            <div class="mt-1">
                <span>Schedule campaigns and send.</span>
            </div>
    
        </div>
        <div class="home-body">


            <span id="body-tab">Test Campaign</span>
            <hr class="mt-0">


        

            <span id="body-tab">Schedule</span>
            <hr class="mt-0">

            <div class="row m-t-3 b-t-3">
                <div class="col-sm-4">
                    <form action="{{ route('campaign.schedule.store', [
                        'slug' => $brand->slug,
                        'uuid' => $campaign->uuid
                    ]) }}" method="post">
                    @csrf
                    @method('PUT')
                        <div class="form-group">    
                            <label for="">Select Date</label>
                            <input type='date' name="date" class="form-control" required/>
                        </div>
                        <div class="form-group">    
                            <label for="">Select Time</label>
                            <input type='time' name="time" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary bt">Schedule</button>
                        </div>
                    </form> 
                </div>
                <div class="col-sm-8">
                    <h5>Preview</h5>
                    <div class="border template m-b-1">
                            {!! $campaign->html !!}
                    </div>
                </div>
            </div>
        </div>
    </div>                
 -->