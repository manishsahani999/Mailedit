@extends('layouts.app')

@section('links')

@enDsection

@section('content')
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
            <form action="{{ route('email.send', $campaign->uuid) }}" method="get">
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
                / {{ ucwords($campaign->name) }} / Designing / Schedule
            </h4>
            <div class="mt-1">
                <span>Schedule campaigns and send.</span>
            </div>
            @include('components.sessions')
            @include('components.errors')
        </div>
        <div class="home-body">

            <!-- test campaign -->
            <span id="body-tab">Test Campaign</span>
            <hr class="mt-0">

            <!-- test form -->
            <form action="{{ route('email.test', [
                                    'slug' => $brand->slug,
                                    'uuid' => $campaign->uuid
                            ]) }}" method="post">
            @csrf
            <div class="form-group row m-t-3 m-b-3">
                <div class="col-sm-4 text-right mt-1">
                    <img class="mt-3" src="{{ asset('img/flask.svg') }}" alt="" id="test-send-icon">
                </div>
                <div class="col-sm-5">
                    <label >
                        <h5>Test send this Campaign</h5>
                    </label>
                    <div class="form-group">
                    <input type="text" name="test_email" class="form-control form-control-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary bt">Send this newsletter</button>
                    </div>
                </div>
            </div>
            </form>

            <!-- add lists -->
            <span id="body-tab">Add Recipients </span>
            <hr class="mt-0">
            
            <div class="row m-t-2 b-t-3">
                <div class="col-sm-6">
                    <!-- add list form -->
                    <span id="body-tab">Campaign List</span>
                    <hr class="mt-0">
                    <form action="{{ route('campaign.remove.lists', [
                                            'slug' => $brand->slug,
                                            'uuid' => $campaign->uuid
                                    ]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="custom-select" id="campaign-lists" name="lists" multiple>
                            @foreach($campaign->binarySubsList as $list)
                                <option value="{{ $list->id }}">{{ $list->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger bt">Remove list</button>
                    </div>
                    </form> 
                </div>
                <div class="col-sm-6">
                    <!-- form for adding lists to Campaign -->
                    <span id="body-tab">All List</span>
                    <hr class="mt-0">
                    <form action="{{ route('campaign.add.lists', [
                            'slug' => $brand->slug, 
                            'uuid' => $campaign->uuid
                        ]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <select class="custom-select" name="lists" multiple>
                            @foreach($lists as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <button id="schedule" type="submit" class="btn bt btn-primary">Add List</button> 
                    </form>
                    <!-- form end -->
                </div>
            </div>
                        
            <!-- add lists -->
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
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection