@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{ asset('dist/css/bulma-calendar.min.css') }}">
@enDsection

@section('content')
    <div class="wrap">
        <div class="brand-body m-l-1">
        @include('components.sessions')
            <div class="row">
                <div class="col-sm-4">
                    <div class="m-b-1">
                        <h4 class="title is-inline">{{ $brand->brand_name }} </h4>
                        <h5 class="title is-inline">
                            / {{ $campaign->name }}
                        </h5>
                    </div>
                    {{--Test Box--}}
                    <div class="box">
                        <h5 class="title m-b-1">Test send this Campaign</h5>
                        <!-- Email test form -->
                        <form action="{{ route('email.test') }}" method="post">
                            @csrf
                            <!-- Test Input -->
                            <div class="form-group">
                                <label for="">Test emails</label>
                                <input type="text" name="test_email" class="form-control">
                            </div>
                            <!-- Test Buttons -->
                            <div class="form-group">
                                <div class="control">
                                    <button class="btn btn-primary">Test send this newsletter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--Test box end--}}

                    <!-- Define Recipients -->
                    <div class="jumbotron lists_wrap">
                        <h3>Lists</h3>
                        
                        <!-- All lists -->
                        <form action="{{ route('campaign.remove.lists', [
                                    'slug' => $brand->slug,
                                    'uuid' => $campaign->uuid
                            ]) }}" method="post">
                            @csrf
                            <div class="form-group">
                            <div class="form-group">
                                <select class="custom-select" name="lists" multiple>
                                    @foreach($campaign->binarySubsList as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-danger">Remove list</button>
                        </div>
                        </form>
                        
                        <!-- form for adding lists to Campaign -->
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
                            <button type="submit" class="btn btn-primary">Add List</button> 
                        </form>
                        <!-- form end -->
                    </div>

                    {{--send count info --}}
                    <div class="jumbotron">
                        <bold>Recipients: </bold> 139 of 9989 remaining
                        <br>
                        <bold>Send: </bold> 139 of 9989 remaining
                    </div>
                    <div class="m-b-1 m-l-1">
                        <a class="btn btn-dark" href="">Back</a>
                    </div>

                    {{--schedule--}}
                    <div class="jumbotron list_wrap">
                        <h3>Schedule</h3>
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
                            <button class="btn btn-primary">Submit</button>
                        </form>    
                    </div>
                </div>

                <div class="col">
                    <h4 class="title">
                        newsletter
                    </h4>
                    <div class="box">
                        <div class="box">
                            From <span class="badge badge-primary">{{ $campaign->from_name.' <'.$campaign->from_email.'>' }}</span>
                        </div>
                        <div class="box">
                            Status <span class="badge
                                    @if($campaign->status == 'draft')
                                        badge-warning
                                    @elseif($campaign->status == 'scheduled')
                                        badge-primary
                                    @elseif($campaign->status == 'cancelled')
                                        badge-danger
                                    @elseif($campaign->status == 'sending')
                                        badge-secondary
                                    @elseif($campaign->status == 'sent')
                                        badge-success
                                    @endif "

                            >
                                {{ $campaign->status }}
                            </span>
                        </div>
                        <div class="border template">
                            {!! $campaign->html !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/bulma-calendar.min.js') }}"></script>
    <script>
        
    </script>
@endsection