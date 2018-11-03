@extends('layouts.app') 
@section('content')

<div class="wrap">
    @include('components.errors')
    <div class="row">
        <div class="col-sm-4 text-right" id="register-left">
            <div>
                <img class="m-t-5" id="register-icon" src="{{ asset('img/email.svg') }}" alt="">
            </div>
        </div>
        <div class="col m-l-2" id="register-right">
            <div class="m-t-5">
                <h2>Upload Excel in {{ $list->name }}</h2>
            </div>
            <div class="register_wrap m-t-2">
                <div class="m-b-2">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore praesentium consequuntur,
                </div>
                <form action="{{ route('subs.list.import', $list->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control form-control-lg" name="file"  required autofocus>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary register-btn">Get Started</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection