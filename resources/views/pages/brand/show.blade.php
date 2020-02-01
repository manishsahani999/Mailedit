@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">{{ ucwords($brand->brand_name) }} <span class="type--fade" style="font-size: 2.1rem;">/ All Campaigns</span></h3>
                <h5 class="type--fade">Created {{ $brand->created_at->diffForHumans() }} by {{ Auth::user()->name }}.</h5>
                <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('campaign.create', $brand->slug) }}"">
                    <span class="btn__text text-white">Create New Campaign</span>
                </a>
            </div>
        </div>
    </div>
</section>


    <div class="wrap">

        <div class="home-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="p-3">
                        <div class="mb-3">
                            <a href="{{ route('campaign.recent', $brand->slug) }}" class="home-sidebar text-dark">
                                <i class="far fa-clock mr-2 home-sidebar-icon"></i> Recent
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('campaign.ongoing', $brand->slug) }}" class="home-sidebar text-dark">
                                <i class="fas fa-arrow-right mr-2 home-sidebar-icon"></i> ongoing
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('campaign.draft', $brand->slug) }}" class="home-sidebar text-dark">
                                <i class="fas fa-edit mr-2 home-sidebar-icon"></i> Draft
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('campaign.completed', $brand->slug) }}" class="home-sidebar text-dark">
                                <i class="fas fa-check mr-2 home-sidebar-icon"></i> Complete
                            </a>
                        </div>
                    </div>
                    <hr class="mr-5">
                </div>
                <div class="col">
                    <span id="body-tab">All Campaigns</span>
                    <hr class="mt-0">
                    <div class="n-table-wrap">
                    @if (isset($campaigns) && $campaigns->count() != 0)
                        @foreach($campaigns as $campaign)
                            <div class="n-table row">
                                <div class="col-sm-1 n-col-1">
                                    <img class="n-col-icon" src="{{ asset('img/paper-plane.svg') }}" alt="">
                                </div>
                                <div class="col-sm-4 n-col-2">
                                    <h5 class="mb-0">
                                        <a href="{{ route('campaign.show', [
                                            'slug' => $brand->slug, 'uuid' => $campaign->uuid
                                            ]) }}">{{ $campaign->name }}</a>
                                    </h5>
                                    <span>{{ $campaign->status }}</span>
                                    <div>
                                        <span>
                                            Edited <strong>{{ $brand->updated_at->diffForHumans() }}</strong>, by <strong>You</strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-2 p-1">
                                    <label class="n-lb mt-4
                                        @if($campaign->status == 'draft')
                                            n-lb-draft
                                        @elseif($campaign->status == 'scheduled')
                                            n-lb-schedule
                                        @elseif($campaign->status == 'cancelled')
                                            n-lb-cancel
                                        @elseif($campaign->status == 'sending')
                                            n-lb-sending
                                        @elseif($campaign->status == 'sent')
                                            n-lb-sent
                                        @endif">{{ $campaign->status }}</label>
                                </div>
                                <div class="col-sm-1 pt-3 mr-1">
                                    <a href="{{ route('campaign.show', [
                                            'slug' => $brand->slug, 'uuid' => $campaign->uuid
                                            ]) }}" class="btn btn-primary bt">View</a>
                                </div>
                                <div class="col-sm-1 pt-3 ml-1">
                                    <a href="{{ route('campaign.edit', [
                                            'slug' => $brand->slug, 
                                            'uuid' => $campaign->uuid
                                        ]) }}" class="btn n-lb-draft bt">Edit</a>
                                </div>
                                <div class="col-sm-1 pt-3 mr-1">
                                    <a href="{{ route('campaign.stats', [
                                            'slug' => $brand->slug, 
                                            'uuid' => $campaign->uuid
                                        ]) }}" class="btn btn-info bt">Stats</a>
                                </div>
                                <div class="col-sm-1 pt-3">
                                    <form action="{{ route('campaign.destroy', [
                                            'slug' => $brand->slug,
                                            'uuid' => $campaign->uuid]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn n-lb-cancel bt">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @else 
                        <div class="mt-2" id="home-section">
                        @if (Route::currentRouteName() == 'brand.show')
                            <div class="text-center">
                                <img src="{{asset('img/create.svg')}}" alt="" id="section-image">
                                <h3 class="mt-5">Looks like you haven't created a campaign.</h3>
                                <h6>Don't know how to send a campaign? No worries. Click here to <a href="#">Get started</a> campaign.</h6>
                            </div>
                        @elseif (Route::currentRouteName() == 'campaign.draft')
                            <div class="text-center">
                                <img src="{{asset('img/create.svg')}}" alt="" id="section-image">
                                <h3 class="mt-5">No campaigns in draft.</h3>
                                <h6>Don't know how to send a campaign? No worries. Click here to <a href="#">Get started</a> campaign.</h6>
                            </div>
                        @elseif (Route::currentRouteName() == 'campaign.recent')
                            <div class="text-center">
                                <img src="{{asset('img/create.svg')}}" alt="" id="section-image">
                                <h3 class="mt-5">No campaigns in draft.</h3>
                                <h6>Don't know how to send a campaign? No worries. Click here to <a href="#">Get started</a> campaign.</h6>
                            </div>
                        @elseif (Route::currentRouteName() == 'campaign.ongoing')
                            <div class="text-center">
                                <img src="{{asset('img/create.svg')}}" alt="" id="section-image">
                                <h3 class="mt-5">No ongoing Campaigns.</h3>
                                <h6>Don't know how to send a campaign? No worries. Click here to <a href="#">Get started</a> campaign.</h6>
                            </div>
                        @elseif (Route::currentRouteName() == 'campaign.completed')
                            <div class="text-center">
                                <img src="{{asset('img/create.svg')}}" alt="" id="section-image">
                                <h3 class="mt-5">No Completed Campaigns.</h3>
                                <h6>Don't know how to send a campaign? No worries. Click here to <a href="#">Get started</a> campaign.</h6>
                            </div>
                        @endif
                        </div>
                    @endif
                    </div>
                    <div class="pagination ml-auto mr-auto">
                        {!! $campaigns->render() !!}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
