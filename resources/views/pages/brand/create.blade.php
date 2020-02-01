@extends('layouts.app')

@section('content')
<section class="cover space--md pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Create New Brand</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
                <!-- <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('brand.create') }}">
                    <span class="btn__text text-white">Go Back</span>
                </a> -->
            </div>
        </div>
    </div>
</section>

<section class="cover space--md pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('brand.store') }}" method="post">
                    @csrf
                    <div class="row mt-4">
                        <div class="col m-l-2" id="register-right">
                            <div class="register_wrap m-t-2">
                                {{--brand name--}}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="brand_name" value="{{ old('brand_name') }}" required placeholder="Brand Name">
                                </div>
                                {{--from name--}}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="from_name" value="{{ old('from_name') }}" required placeholder="From name">
                                </div>
                                {{--from email--}}
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="from_email" value="{{ old('from_email') }}" required placeholder="From email">
                                </div>
                                {{--replyto email--}}
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="reply_to" value="{{ old('reply_to') }}" required placeholder="Reply to">
                                </div>
                                {{--Allowed files--}}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="allowed_files" value="{{ old('allowed_files') }}" placeholder="Allowed attachments file types">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark type--uppercase">
                                    <span class="btn__text text-white">Create new brand</span>
                                    </button>
                                </div>
                            </div>
                            <!-- register_wrap ends -->
                        </div>
                        <!-- register right ends -->
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