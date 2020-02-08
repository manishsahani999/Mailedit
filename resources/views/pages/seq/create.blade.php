@extends('layouts.app')

@section('content')

<section class="cover space--md pb-5 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Create Sequence</h3>
                <h3 class="type--fade">Select Campagins to send.</h3>

                <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('campaign-blank').submit();">
                    <span class="btn__text text-white">Create an Empty Campagin</span>
                </a>

                <form id="campaign-blank" action="{{ route('campaign.store', $brand->slug) }}" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</section>

<section class="cover pb-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                
            </div>
            <div class="col-md-3">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-select">
                            <select class="form-control form-control-lg" name="lists">
                                @foreach($campaigns as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn type--uppercase">Add to Sequence</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection