@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="main-heading">
        <div class="title is-inline">Select brand</div>
        <div class="is-right">
            <a href="{{ route('brand.create') }}" class="button is-primary">Add Brand</a>
        </div>
    </div>
    <div class="main-body m-t-1">
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
