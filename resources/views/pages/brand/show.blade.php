@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">{{ ucwords($brand->brand_name) }}</h2>
            <div class="right-pc">
                <a href="{{ route('campaign.create', $brand->slug) }}" class="btn btn-secondary bt">Create Campaigns</a>
            </div>
            <div class="mt-1">
                <span>Created {{ $brand->created_at->diffForHumans() }} by {{ Auth::user()->name }}.</span>
            </div>
            @include('components.sessions')
        </div>
        @include('components.sessions')
        <div class="home-body">
            <hr>
            <h5 class="ml-2">All Campaigns</h5>
            <div class="body-table">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>S no.</th>
                        <th>Campaign Name</th>
                        <th>Status</th>
                        <th>Recipients Count</th>
                        <th>Sent to</th>
                        <th>View</th>
                        <th>edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($campaigns as $campaign)
                        <tr class="text-center">
                            <th>{{ $loop->index+1 }}</th>
                            <td><a href="{{ route('campaign.show', ['slug' => $brand->slug, 'uuid' => $campaign->uuid]) }}">{{ $campaign->title }}</a></td>
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
                                    @endif lb"
                                >
                                    {{ $campaign->status }}
                                </span>
                            </td>
                            <td>{{ $campaign->recipients_count }}</td>
                            <td>{{ $campaign->sent_count }}</td>
                            <td>
                                <a class="btn btn-secondary bt" 
                                    href="{{ route('campaign.show', [
                                        'slug' => $brand->slug, 'uuid' => $campaign->uuid
                                    ]) }}">View</a>
                            </td>
                            <td>
                                <a href="{{ route('campaign.edit', [
                                        'slug' => $brand->slug, 
                                        'uuid' => $campaign->uuid
                                    ]) }}" class="btn btn-warning bt">Edit</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger bt">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection
