@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">{{ ucwords($brand->brand_name) }}</h2>
            <h4 class="inline-pc">/ {{ $campaign->name }} / Stats</h4>
            <div class="mt-1"><span>lorem ipsum dolo sit.</span></div>
        </div>
        <div class="home-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="pl-3">
                        <h2 class="t-lg inline-pc">{{ ucwords($campaign->status) }}</h2>
                        @if ($campaign->status == 'sent')
                            <span class="ml-1 t-lg"><strong>to</strong></span> 
                            <h2 class="ml-1 inline-pc">{{ $campaign->recipients_count }}</h2>
                        @endif
                        @if ($campaign->status == 'sending')
                            <span class="ml-1 t-lg"><strong>to</strong></span> 
                            <h2 class="ml-1 inline-pc">{{ $campaign->recipients_count }}</h2>
                        @endif
                    </div>
                    <div class="pl-3 pr-3 pt-3">
                        <div class="mb-2">
                            <p class="inline-pc t-lg"><strong>Recipients </strong></p>
                            <h4 class="mb-0 inline-pc">{{ $campaign->recipients_count }}</h4>
                        </div>
                        <div class="mb-2">
                            <p class="inline-pc t-lg"><strong>Ended at</strong></p>
                            <h6 class="inline-pc">{{ (isset($campaign->starts_at)) ? $campaign->starts_at : 'Not Started'  }}</h6>
                        </div>
                        <div class="mb-2">
                            <p class="inline-pc t-lg"><strong>Ended at</strong></p>
                            <h6 class="inline-pc">{{ (isset($campaign->ends_at)) ? $campaign->ends_at : 'Not ended yet'  }}</h6>
                        </div>
                        <div class="mb-3">
                            
                        </div>
                    </div>
                    <hr class="mr-5">
                </div>
                <div class="col">
                    <span id="body-tab">Campaign Data</span>
                    <hr class="mt-0"> 
                    <div class="row">
                        <div class="col-sm-3 pt-5 ">
                            <h4 class=" ml-4 mt-1">Open rate</h4>
                        </div>
                        <div class="col-sm-9">
                            <div class="range-slider">
                            <input class="r-slider-input" type="range" value="60" min="0" max="100" disabled>
                            <span class="r-slider-value">60 %</span>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-3 pt-5 pb-5">
                            <h4 class=" ml-4 mt-1">Click rate</h4>
                        </div>
                        <div class="col-sm-9">
                            <div class="range-slider">
                            <input class="r-slider-input" type="range" value="30" min="0" max="100" disabled>
                            <span class="r-slider-value">30 %</span>
                            </div>
                        </div>
                    </div> 
                    
                    <span id="body-tab">Raw Data</span>
                    <hr class="mt-0">
                    <div class="n-table-wrap">
                        <div class="n-table row">
                            <div class="col-sm-1 n-col-1">
                                <img class="n-col-icon" src="{{ asset('img/ppc.svg') }}" alt="">
                            </div>
                            <div class="col-sm-5 n-col-2 pt-3 ">
                                <h5>
                                    Emails delivered
                                </h5>
                            </div>
                            <div class="col-sm-2 pt-2">
                                <h2 class="t-l">{{ $campaign->emails->count() }}</h2>
                            </div>
                            <div class="col-sm-2 pt-2">
                                <h3 class="ml-3 mb-0">8</h3>
                                <span>No of Links</span>
                            </div>
                            <div class="col-sm-1 pt-3">
                                <a href="{{ route('campaign.edit', [
                                        'slug' => $brand->slug, 
                                        'uuid' => $campaign->uuid
                                    ]) }}" class="btn n-lb-draft bt">View All Links</a>
                            </div>  
                        </div>
                        <hr>
                    </div>
                    <div class="n-table-wrap">
                        <div class="n-table row">
                            <div class="col-sm-1 n-col-1">
                                <img class="n-col-icon" src="{{ asset('img/ppc.svg') }}" alt="">
                            </div>
                            <div class="col-sm-5 n-col-2 pt-3 ">
                                <h5>
                                    Links Clicked
                                </h5>
                            </div>
                            <div class="col-sm-2 pt-2">
                                <h2 class="t-l">7877</h2>
                            </div>
                            <div class="col-sm-2 pt-2">
                                <h3 class="ml-3 mb-0">8</h3>
                                <span>No of Links</span>
                            </div>
                            <div class="col-sm-1 pt-3">
                                <a href="{{ route('campaign.edit', [
                                        'slug' => $brand->slug, 
                                        'uuid' => $campaign->uuid
                                    ]) }}" class="btn n-lb-draft bt">View All Links</a>
                            </div>  
                        </div>
                        <hr>
                    </div>
                </div> 
                </div>
            </div>
        </div>
    </div>
@endsection