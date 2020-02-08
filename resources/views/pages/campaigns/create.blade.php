@extends('layouts.app')

@section('content')
<section class="cover space--md pb-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Create Campagin</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>

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

<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="slider slider--columns" data-paging="true">
                    <ul class="slides is-draggable">
                        <div class="flickity-viewport">
                            <div class="flickity-slider">
                                @foreach($preset_templates as $item)
                                <li class="col-md-3 col-6 slide is-selected text-center">
                                    <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('campaign-{{$item->uuid}}').submit();">
                                        <img alt="Image" class="border--round" src="https://images.pexels.com/photos/3584996/pexels-photo-3584996.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                                    </a>
                                    <h5 class="mt-2 type--fade type--uppercase">{{ $item->name }}</h5>
                                </li>
                                <form id="campaign-{{$item->uuid}}" action="{{ route('campaign.store', $brand->slug) }}" method="post">
                                    @csrf
                                    <input name="preset_template" type="hidden" value="{{$item->id}}">
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <!--end of col-->
        </div>
        <!--end row-->
    </div>
    <!--end of container-->
</section>

@endsection