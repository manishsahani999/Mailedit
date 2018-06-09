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
            <tr>
                <th>1</th>
                <td><a href="">Lorem</a></td>
                <td>23</td>
                <td><a href="" class="button">Edit</a></td>
                <td><a href="" class="button">Delete</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
