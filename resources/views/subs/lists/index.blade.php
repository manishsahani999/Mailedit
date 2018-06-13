@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title is-inline">All Lists</div>
            <div class="is-right">
                <a href="{{ route('subs.list.create') }}" class="button">Add List</a>
            </div>
        </div>
        <div class="brand-body">
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
                @foreach($lists as $list)
                    <tr>
                        <th>{{ $brand->id }}</th>
                        {{--<td><a href="{{ route('campaign.show', ['slug' => $brand->slug, 'uuid' => $campaign->uuid]) }}">{{ $brand->brand_name }}</a></td>--}}
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