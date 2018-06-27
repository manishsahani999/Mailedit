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
                                <img class="n-col-icon" src="{{ asset('img/trolley.svg') }}" alt="">
                            </div>
                            <div class="col-sm-4 n-col-2 pt-3 ">
                                <h5>
                                    Emails Opened
                                </h5>
                            </div>
                            <div class="col-sm-2 pt-2 text-center">
                                <h3 class="t-l mb-0">{{ $opened }}</h3>
                                <span>Opened</span>
                            </div>
                            <?php $sent = $campaign->emails->where('status','sent')->count(); ?>
                            <div class="col-sm-2 pt-2 text-center">
                                <h3 class="mb-0">{{ $sent }}</h3>
                                <span>Sent</span>
                            </div>
                            <div class="col-sm-1 pt-3">
                                <a id=""  class="btn n-lb-draft bt">View Something</a>
                            </div>  
                        </div>
                        <hr>
                    </div>
                    <div class="n-table-wrap">
                        <div class="n-table row">
                            <div class="col-sm-1 n-col-1">
                                <img class="n-col-icon" src="{{ asset('img/ppc.svg') }}" alt="">
                            </div>
                            <div class="col-sm-4 n-col-2 pt-3 ">
                                <h5>
                                    Links Clicked
                                </h5>
                            </div>
                            <div class="col-sm-2 pt-2 text-center">
                                <h2 class="mb-0">{{ $clicked }}</h2>
                                <span>Clicked</span>
                            </div>
                            <div class="col-sm-2 pt-2 text-center">
                                <h3 class="mb-0">{{ $sent*count($links) }}</h3>
                                <span>Total Links</span>
                            </div>
                            <div class="col-sm-2 pt-3">
                                <a class="btn n-lb-draft bt" id="n-table-row-toggle">View Detailed Analysis</a>
                            </div>  
                        </div>
                        @if ($links)
                        <hr id="n-table-hr" class="d-none">
                        <div class="n-table-has-content d-none pt-1 pl-5" id="n-table-row-extended">
                            <h5 class="mb-1">Email links</h5>    
                            <hr class="mt-0 mr-5">
                            @foreach ($links as $link)
                                <div class="row">
                                    <div class="col-sm-1 pt-3 text-center">
                                        <i class="fas fa-link"></i>
                                    </div>
                                    <div class="col-sm-3">
                                        <span>{{ (strlen($link) > 40 ) ? substr($link, 0, 40) : $link }}</span>
                                        @if (strlen($link) > 40)
                                            <span>........</span><span class="n-lb n-lb-draft">more</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-1 offset-sm-1 pt-3 text-center">
                                        <a target="_blank" href="{{ $link }}"><i class="fas fa-external-link-alt"></i></a>
                                    </div>
                                    <div class="col-sm-1 offset-sm-1 text-center">
                                        <h4 class="mb-0">8</h4>
                                        <span>Clicked</span>
                                    </div>
                                    <div class="col-sm-1 offset-sm-1 text-center">
                                        <h4 class="mb-0">8 <span class="t-lg">%</span></h4>
                                        <span>Percentage</span>
                                    </div>
                                </div>
                                <hr class="mb-5 mr-5">
                            @endforeach
                        </div>
                        @endif
                        <hr> 
                    </div>
                </div> 
                </div>
            </div>
        </div>
    </div>
@endsection @section('scripts')
    <script>
    $(document).ready(function(){
        $("#n-table-row-toggle").click(function(){
            $("#n-table-row-toggle").toggleClass("n-btn");
            $("#n-table-hr").toggleClass("d-none");
            $(".n-table-has-content").toggleClass("d-none", 4000, "easeInQuad");
        });
    });
</script>
@endsection
