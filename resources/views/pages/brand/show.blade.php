@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title">{{ $brand->brand_name }}</div>
        </div>
        <div class="brand-body m-t-1 m-l-1">
            <div class="title is-5 is-inline">All Campaigns</div>
            <div class="is-right">
                <a href="{{ route('campaign.create', $brand->slug) }}" class="button">Create and Send new campaigns</a>
            </div>
            <table class="table is-fullwidth">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Brands</th>
                    <th>lorem</th>
                    <th>edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($campaigns as $campaign)
                    <tr>
                        <th>{{ $brand->id }}</th>
                        <td><a href="{{ route('brand.show', $brand->slug) }}">{{ $brand->brand_name }}</a></td>
                        <td>23</td>
                        <td><a href="" class="button">Edit</a></td>
                        <td><a href="" class="button">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
