@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="main-heading">
        <h4 class="title is-inline">Select brand</h4>
        <div class="is-right">
            <a href="{{ route('brand.create') }}" class="btn btn-primary">Add Brand</a>
        </div>
    </div>
    <div class="main-body m-t-1">
        <table class="table">
            <thead>
            <tr class="text-center">
                <th scope="col">Id</th>
                <th scope="col">Brands</th>
                <th scope="col">lorem</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr class="text-center">
                    <th>{{ $brand->id }}</th>
                    <td><a href="{{ route('brand.show', $brand->slug) }}">{{ $brand->brand_name }}</a></td>
                    <td>23</td>
                    <td class="text-center">
                        <a href="{{ route('brand.show', $brand->slug) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('brand.edit', $brand->slug) }}" class="btn">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
