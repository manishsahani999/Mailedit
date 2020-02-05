@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Update {{ $list->name }}</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
                <!-- <a class="" href="{{ route('brand.create') }}">
                    <span class="btn__text text-white">Create New Brand</span>
                </a> -->
            </div>
        </div>
    </div>
</section>

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('subs.list.update', $list->uuid) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" value="{{ $list->name }}" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="btn type--uppercase" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</section>
@endsection