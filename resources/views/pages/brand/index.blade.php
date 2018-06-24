@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="home-header"> 
        <h2 class="inline-pc">Brands</h4>
        <div class="right-pc">
            <a href="{{ route('brand.create') }}" class="btn btn-secondary bt">Create Brand</a>
        </div>
        <div class="mt-1">
            <span>You can send campaigns by creating a brand.</span>
        </div>
        @include('components/sessions')
    </div>

    <div class="home-body">
        <hr>
        <h5 class="ml-2">All Brands</h5>
        
        <div class="body-table">
            <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">S no.</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Created</th>
                <th scope="col">Campaigns</th>
                <th scope="col">Sent</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr class="text-center">
                    <th>{{ $loop->index+1 }}</th>
                    <td><a href="{{ route('brand.show', $brand->slug) }}">{{ $brand->brand_name }}</a></td>
                    <td>{{ $brand->created_at->diffForHumans() }}</td>
                    <td>{{ count($brand->binaryCampaign()->get()) }}</td>
                    <td>{{ count($brand->binaryCampaign()->whereStatus('sent')->get()) }}</td>
                    <td>
                        <a href="{{ route('brand.show', $brand->slug) }}" class="btn btn-secondary bt">View</a>
                    </td>
                    <td>
                        <a href="{{ route('brand.edit', $brand->slug) }}" class="btn btn-warning bt">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('brand.destroy', $brand->slug) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger bt">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        
    </div>
</div>
@endsection
