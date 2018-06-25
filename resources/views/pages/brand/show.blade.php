@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">{{ ucwords($brand->brand_name) }}</h2>
            <h4 class="inline-pc">/ All Campaigns</h4>
            <div class="right-pc">
                <a href="{{ route('campaign.create', $brand->slug) }}" class="btn btn-secondary bt">Create Campaigns</a>
            </div>
            <div class="mt-1">
                <span>Created {{ $brand->created_at->diffForHumans() }} by {{ Auth::user()->name }}.</span>
            </div>
            @include('components.sessions')
        </div>
        <div class="home-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="p-3">
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
                                <i class="far fa-clock mr-2 home-sidebar-icon"></i> Recent
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
                                <i class="fas fa-arrow-right mr-2 home-sidebar-icon"></i> ongoing
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
                                <i class="fas fa-edit mr-2 home-sidebar-icon"></i> Draft
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
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
                            @foreach($campaigns as $campaign)
                                <div class="n-table row">
                                    <div class="col-sm-1 n-col-1">
                                        <img class="n-col-icon" src="{{ asset('img/paper-plane.svg') }}" alt="">
                                    </div>
                                    <div class="col-sm-5 n-col-2">
                                        <h5 class="mb-0">
                                            <a href="{{ route('campaign.show', [
                                                'slug' => $brand->slug, 'uuid' => $campaign->uuid
                                                ]) }}">{{ $campaign->name }}</a>
                                            <!-- <img id="n-draft" src="{{ asset('img/draft.svg') }}" alt="">     -->
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
                                    <div class="col-sm-1 pt-3">
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
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
