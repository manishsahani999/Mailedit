@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <h4 class="title">{{ $brand->brand_name }}</h4>
        </div>
        @include('components.sessions')
        <div class="brand-body m-t-1 m-l-1">
            <h5 class="title is-inline">All Campaigns</h5>
            <div class="is-right">
                <a href="{{ route('campaign.create', $brand->slug) }}" class="btn btn-primary">Create and Send new campaigns</a>
            </div>
            <table class="table m-t-1">
                <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Brands</th>
                    <th>status</th>
                    <th>edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($campaigns as $campaign)
                    <tr class="text-center">
                        <th>{{ $brand->id }}</th>
                        <td><a href="{{ route('campaign.show', ['slug' => $brand->slug, 'uuid' => $campaign->uuid]) }}">{{ $brand->brand_name }}</a></td>
                        <td>
                            <span class="badge
                                @if($campaign->status == 'draft')
                                    badge-warning
                                @elseif($campaign->status == 'scheduled')
                                    badge-primary
                                @elseif($campaign->status == 'cancelled')
                                    badge-danger
                                @elseif($campaign->status == 'sending')
                                    badge-secondary
                                @elseif($campaign->status == 'sent')
                                    badge-success
                                @endif "
                            >
                                {{ $campaign->status }}
                            </span>
                        </td>
                        <td><a href="" class="button">Edit</a></td>
                        <td><a href="" class="button">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
