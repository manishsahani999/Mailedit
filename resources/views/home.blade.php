@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="main-heading">
        <h4 class="title is-inline">Select brand</h4>
        <div class="is-right">
            <a href="{{ route('brand.create') }}" class="btn is-primary">Add Brand</a>
        </div>
    </div>
    <div class="main-body m-t-1">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Brands</th>
                <th scope="col">lorem</th>
                <th scope="col">Act</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
                <tr>
                    <th>{{ $brand->id }}</th>
                    <td><a href="{{ route('brand.show', $brand->slug) }}">{{ $brand->brand_name }}</a></td>
                    <td>23</td>
                    <td><a href="{{ route('brand.edit', $brand->slug) }}" class="button">Edit</a></td>
                    <td><a href="" class="button">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
