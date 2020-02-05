@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Upload Excel in {{ $list->name }} </h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
            </div>
        </div>
    </div>
</section>

<section class="cover space--md pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('subs.list.import', $list->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control form-control-lg" name="file" required autofocus>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary btn-dark type--uppercase">Get Started</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-center hidden-xs">
                <img class="image--md" src="{{ asset('img/create.svg') }}" alt="">
            </div>
        </div>
    </div>
</section>


@endsection