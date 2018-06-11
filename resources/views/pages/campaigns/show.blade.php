@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{ asset('dist/css/bulma-calendar.min.css') }}">
@enDsection

@section('content')
    <div class="wrap">
        <div class="brand-body m-l-1">
            <div class="columns">
                <div class="column is-4">
                    <div class="m-b-1">
                        <div class="title is-inline">{{ $brand->brand_name }} </div>
                        <div class="title is-5 is-inline">
                            / {{ $campaign->name }}
                        </div>
                    </div>
                    {{--Test Box--}}
                    <div class="box">
                        <div class="title is-5 m-b-1">Test send this Campaign</div>
                        {{--Test Input--}}
                        <div class="field">
                            <div class="control">
                                <label for="" class="label">Test emails
                                    <input type="text" class="input">
                                </label>
                            </div>
                        </div>
                        {{--Test Buttons--}}
                        <div class="field">
                            <div class="control">
                                <button class="button">Test send this newsletter</button>
                            </div>
                        </div>
                    </div>
                    {{--Test box end--}}

                    {{--Define Recipients--}}
                    <div class="title is-5 m-t-1">define recipients</div>
                    <div class="notification is-dark">
                        <div class="title is-4">List here</div>
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. A atque cum deserunt id veritatis. Animi,
                            cum deleniti deserunt facilis id illum iste
                            laudantium natus odio omnis pariatur qui quis voluptatum.
                        </div>
                        {{--exclude list button--}}
                        <div class="field">
                            <div class="control">
                                <button class="button">Exclude list from this campaign</button>
                            </div>
                        </div>
                    </div>

                    {{--send count info --}}
                    <div class="box">
                        <bold>Recipients: </bold> 139 of 9989 remaining
                        <br>
                        <bold>Send: </bold> 139 of 9989 remaining
                    </div>
                    <div class="m-b-1 m-l-1">
                        <a class="is-link" href="">Back</a>
                    </div>

                    {{--schedule--}}
                    <div class="box">
                        <div class="title is-5">
                            schedule this campaign
                        </div>
                        <div class="field">
                            <div class="control">
                                <input id="datepickerDemo" class="input" type="date">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button">Schedule campaign</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="title is-4">
                        newsletter
                    </div>
                    <div class="box"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/bulma-calendar.min.js') }}"></script>
@endsection