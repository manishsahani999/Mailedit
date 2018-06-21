@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2>Get Started with Brands</h2>
            <div class="mt-1">
                <span>For Sending Campaigns, create a brand first.</span>
            </div>
            @include('components/sessions')
        </div>
        <div class="home-body">
            <span id="body-tab">Create Brand</span>            
            <hr class="mt-0"> 
            @include('components.errors')
            <!-- Form start -->
            <form action="{{ route('brand.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4 m-t-5 text-right" id="register-left">
                        <div>
                            <img class="m-t-5" id="create-brand-icon" src="{{ asset('img/create.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="col m-l-2" id="register-right">
                        <div class="m-t-5">
                            <h2>Create Brand</h2>
                            @include('components.errors')
                        </div>
                        <div class="register_wrap m-t-2">
                            {{--brand name--}}
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg"
                                    name="brand_name" value="{{ old('brand_name') }}"
                                    required placeholder="Brand Name">
                            </div>
                            {{--from name--}}
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg"
                                        name="from_name" value="{{ old('from_name') }}"
                                        required placeholder="From name">
                            </div>
                            {{--from email--}}
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg"
                                        name="from_email" value="{{ old('from_email') }}"
                                        required placeholder="From email">
                            </div>
                            {{--replyto email--}}
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg"
                                        name="reply_to" value="{{ old('reply_to') }}"
                                        required placeholder="Reply to">
                            </div>
                            {{--Allowed files--}}
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg"
                                        name="allowed_files"
                                        value="{{ old('allowed_files') }}"
                                        placeholder="Allowed attachments file types">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info register-btn">
                                    Create brand
                                </button>
                            </div>
                        </div>
                        <!-- register_wrap ends -->
                    </div>
                    <!-- register right ends -->
                </div>
                <!-- home body ends -->
                <span id="body-tab">Brand Settings</span>            
                <hr class="mt-0">
            </form>
        </div>

    </div>
@endsection
