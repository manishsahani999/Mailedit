@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Schedule {{ucwords($campaign->name) }}</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
            </div>
        </div>
    </div>
</section>

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="post" action="{{ route('campaign.schedule.update', [$brand->slug, $campaign->uuid]) }}" class="row mt-0">
                    @csrf
                    <div class="col-md-6">
                        <input type="text" name="date" class="datepicker" placeholder="Choose a date" />
                    </div>
                    <div class="col-md-3">
                        <input type="time" name="time" class="" placeholder="Choose a time" />
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn">Schedule</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection