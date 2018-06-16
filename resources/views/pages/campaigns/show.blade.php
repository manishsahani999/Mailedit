@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{ asset('dist/css/bulma-calendar.min.css') }}">
@enDsection

@section('content')
    <div class="wrap">
        <div class="brand-body m-l-1">
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
                        <form action="{{ route('email.test') }}" method="post">
                            @csrf
                            {{--Test Input--}}
                            <div class="form-group">
                                <label for="">Test emails</label>
                                <input type="text" class="form-control">
                            </div>
                            {{--Test Buttons--}}
                            <div class="form-group">
                                <div class="control">
                                    <button class="btn btn-primary">Test send this newsletter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--Test box end--}}

                    {{--Define Recipients--}}
                    <div class="jumbotron">
                        <h1 class="display-4">List Here</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
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
                    <div class="box">
                        <div class="title is-5">
                            schedule this campaign
                        </div>
                        <div class="form-group">
                                <input id="datepickerDemo" class="form-control" type="date">
                        </div>
                        <div class="form-group">
                                <button class="btn btn-dark">Schedule campaign</button>
                        </div>
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
@endsection