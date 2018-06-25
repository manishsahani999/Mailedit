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
                    <div class="p-3">
                        <div class="mb-3">
                            <span><strong>Status</strong> 
                                <label class="n-lb
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
                                        @endif">{{ $campaign->status }}
                                </label>
                            </span>
                        </div>
                        <div class="mb-3">
                            <span><strong>Recipients</strong>
                                <label for="" class="n-lb n-lb-draft">{{ $campaign->recipients_count }}</label>
                            </span>
                        </div>
                        <div class="mb-3">
                            <span><strong>Send to</strong>
                                <label for="" class="n-lb n-lb-sent">{{ $campaign->recipients_count }}</label>
                            </span>
                        </div>
                        <div class="mb-3">
                            <span><strong>Sending</strong>
                                <label for="" class="n-lb n-lb-sending">{{ $campaign->sending_count }}</label>
                            </span>
                        </div>
                    </div>
                    <hr class="mr-5">
                </div>
                <div class="col">
                    <span id="body-tab">Campaign Data</span>
                    <hr class="mt-0">   
                </div>
            </div>
        </div>
    </div>
@endsection