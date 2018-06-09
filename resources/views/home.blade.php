@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="main-heading">
        <div class="title is-inline">Select brand</div>
        <div class="is-right">
            <a href="{{ route('brand.create') }}" class="button is-primary">Add Brand</a>
        </div>
    </div>
</div>
@endsection
