@extends('layouts.app')

@section('content')
<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0 font-nunito"  style="font-size: 3rem;">Hello, {{ Auth::user()->name }}</h3>
                <h3 class="type--fade">Welcome to your Dashboard.</h3>
            </div>
        </div>
    </div>
</section>
<section class="cover space--md">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-1" style="font-size: 1.5rem;">Start your day off right with some account stats and recommendations.</h3>



                <div class="row mt-4">
                    <div class="col-md-8">
                        <small>Your latest brand - {{ ($brand) ? $brand->brand_name : "" }}, with latest campaign {{ ($campaign) ? $campaign->name : '' }}.</small>
                        @if($campaign && $campaign->recipients_count != 0)
                        <div class="row pt-3 pb-4">
                            <div class="col-md-4 col-sm-6 text-center">
                                <h1 class="mb-0 type--fade" style="font-size: 5em;">
                                    @php $rc = strval($campaign->recipients_count); @endphp
                                    {{ (strlen($rc) < 4) ? $rc : '' }}
                                    {{ (strlen($rc) == 4) ? ''.$rc[0].'K+' : '' }}
                                    {{ (strlen($rc) == 5) ? ''.$rc[0].$rc[1].'K+' : '' }}
                                    {{ (strlen($rc) == 6) ? ''.$rc[0].'M+' : '' }}
                                    {{ (strlen($rc) == 7) ? ''.$rc[0].$rc[1].'M+' : '' }}
                                    {{ (strlen($rc) > 7) ? ''.$rc[0].'B+' : '' }}
                                </h1>
                                <small>Recipients Count</small>
                            </div>
                            <div class="col-md-3 col-sm-6 text-center">
                                <h1 class="mb-0 type--fade" style="font-size: 5rem;">
                                    @php $sc = strval($campaign->sent_count); @endphp
                                    {{ (strlen($sc) < 4) ? $sc : '' }}
                                    {{ (strlen($sc) == 4) ? ''.$sc[0].'K+' : '' }}
                                    {{ (strlen($sc) == 5) ? ''.$sc[0].$sc[1].'K+' : '' }}
                                    {{ (strlen($sc) == 6) ? ''.$sc[0].'M+' : '' }}
                                    {{ (strlen($sc) == 7) ? ''.$sc[0].$sc[1].'M+' : '' }}
                                    {{ (strlen($sc) > 7) ? ''.$sc[0].'B+' : '' }}
                                </h1>
                                <small>Sent Count</small>
                            </div>
                        </div>
                        @else 
                        <br><br>
                        @endif
                        <br>
                        <a class="btn btn--sm type--uppercase" href="{{ route('brand.index') }}">
                            <span class="btn__text">View all Brand</span>
                        </a>
                        <a class="btn btn--sm type--uppercase" href="{{ route('brand.create') }}">
                            <span class="btn__text">Create NEW Brand</span>
                        </a>
                    </div>
                    <div class="col-md-4 pt-5 mt-5">
                        <img class="image--md" src="{{ asset('img/paper-plane.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection