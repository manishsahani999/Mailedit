@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">{{ ucwords($list->name) }} / Add Subscriber </h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
            </div>
        </div>
    </div>
</section>


<section class="cover space--md pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('subs.store', $list->uuid) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control form-control-lg" placeholder="First Name" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" value="{{ old('last_name') }}" name="last_name" placeholder="Last Name" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" value="{{ old('email') }}" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" value="{{ old('phone') }}" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-secondary btn-dark type--uppercase">CREATE</button>
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