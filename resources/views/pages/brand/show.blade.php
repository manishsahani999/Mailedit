@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">{{ ucwords($brand->brand_name) }} <span class="type--fade" style="font-size: 2.1rem;">/ All Campaigns</span></h3>
                <h5 class="type--fade">Created {{ $brand->created_at->diffForHumans() }} by {{ Auth::user()->name }}.</h5>
                <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('campaign.create', $brand->slug) }}"">
                    <span class=" btn__text text-white">Create New Campaign</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="accordion accordion-2 accordion--oneopen">
                    @foreach ($campaigns as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->name}}
                                <small>
                                    <span class="badge
                                        @if($item->status == 'draft') text-warning
                                        @elseif($item->status == 'published') text-success
                                        @else badge-dark @endif">
                                        {{ $item->status }}
                                    </span>
                                </small>
                            </span>
                        </div>
                        <div class="accordion__content">
                            <small>
                                Edited <strong>{{ $item->updated_at->diffForHumans() }}</strong>, by <strong>You</strong>
                            </small>
                            <small>
                                . Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                            </small>
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{ route('campaign.show', [
                                            'slug' => $brand->slug, 'uuid' => $item->uuid
                                            ]) }}">
                                    <span class="btn__text">
                                        View
                                    </span>
                                </a>

                                <a class="btn btn--sm type--uppercase" href="{{ route('campaign.edit', [
                                            'slug' => $brand->slug, 
                                            'uuid' => $item->uuid
                                        ]) }}">
                                    <span class="btn__text">
                                        Edit
                                    </span>
                                </a>

                                <a class="btn btn--sm type--uppercase" href="{{ route('campaign.stats', [
                                            'slug' => $brand->slug, 
                                            'uuid' => $item->uuid
                                        ]) }}">
                                    <span class="btn__text">
                                        Stats
                                    </span>
                                </a>

                                <a class="btn btn--sm type--uppercase" href="" onclick="event.preventDefault();
                                    document.getElementById('delete-form--{{$item->slug}}').submit();">
                                    <span class="btn__text">
                                        Delete
                                    </span>
                                </a>
                                <form id="delete-form--{{$item->slug}}" class="" action="{{ route('campaign.destroy', [
                                            'slug' => $brand->slug,
                                            'uuid' => $item->uuid]) }}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-2">
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
        </div>
    </div>
</section>
@endsection