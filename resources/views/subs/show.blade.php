@extends('layouts.app')



@section('content')

<div class="wrap">
    <div class="home-header">
        <h2 class="inline-pc">{{ ucwords($list->name) }} /</h2>
        <h3 class="inline-pc">{{ $subs->first_name.' '.$subs->last_name }}</h3>
    </div>
</div>
<div class="home-body">
    <div class="row">
        <div class="col-sm-3">
            <h3 class="text-center">User info</h3>
            <div class="text-center mt-3">
                <img id="mailman" src="{{ asset('img/postman.svg') }}" alt="">
            </div>
            <div class="text-center mt-3">
                <span class="d-block">{{ $subs->first_name.' '.$subs->last_name }}</span>
                <lable class="n-lb n-lb-draft d-block mb-1 mt-1">{{ $subs->email }}</lable>
                <label for="" class="n-lb n-lb-cancel">{{ $subs->phone }}</label>
            </div>
        </div>
        <div class="col">
            <span id="body-tab">{{ $subs->first_name }}'s Timeline</span>
            <hr class="mt-0">
            <div class="row">
                <?php
                    $opened = 0;
                    $clicks = 0;
                    $open_rate = 0;
                    $sent = $emails->count();
                    foreach ($emails as $email) {
                        if ($email->status) {
                            $opened++;
                        }
                        $clicks += $email->clicks;
                    }

                    $open_rate = ($opened / $sent)*100;
                ?>  
                <div class="col-sm-2 text-center">
                    <h3>{{ $opened }}</h3>
                    <span>Emails Opened</span>
                </div>
                <div class="col-sm-2 text-center">
                    <h3>{{ $sent }}</h3>
                    <span>Emails Sent</span>
                </div>
                <div class="col-sm-2 text-center">
                    <h3>{{ $clicks }}</h3>
                    <span>Links clicked</span>
                </div>
                <div class="col-sm-2 text-center">
                    <h3>{{ $open_rate }} <span class="t-lg">%</span></h3>
                    <span>Open rate</span>
                </div>
                <div class="col-sm-4 text-center">
                    <h3>6 PM</h3>
                    <span>Average opening time</span>
                </div>
            </div>
            <hr class=" ml-1 mr-1 mb-0">
            @foreach ($emails as $email)
                <div class="row ml-1 mr-1 mt-0 mb-0 @if($email->opened) n-lb-open @endif">
                    <div class="col-sm-1">
                        <img id="message-open-icon"  src="{{ asset('img/email.svg') }}" alt="">
                    </div>
                    <div class="col-sm-3 pt-1">{{ $email->subject }}</div>
                    <div class="col-sm-2 pt-1">
                        {{ $email->status }}
                    </div>
                    <div class="col-sm-3 pt-1">{{ $email->sent_on }}</div>
                    <div class="col-sm-3 pt-1">{{ $email->opened_on }}</div>
                </div>
                <hr class="mt-0 mb-0 ml-1 mr-1">
            @endforeach
        </div>
    </div>
</div>

@endsection