@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <h3 class="title">New brand</h3>
        </div>
        <div class="brand-body m-t-1">
            {{--Form start--}}
            <form action="{{ route('brand.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-4 m-l-1">
                        <h5 class="title">Brand info</h5>
                            {{--brand name--}}
                            <div class="form-group">
                                    <label> Brand Name</label>
                                    <input type="text" class="form-control"
                                            name="brand_name"
                                           value="{{ old('brand_name') }}"
                                           required>
                            </div>
                            {{--from name--}}
                            <div class="form-group">
                                <label class="label"> From Name </label>
                                    <input type="text" class="form-control"
                                           name="from_name"
                                           value="{{ old('from_name') }}"
                                           required>
                            </div>
                            {{--from email--}}
                            <div class="form-group">
                                    <label class="label"> From email</label>
                                        <input type="email" class="form-control"
                                               name="from_email"
                                               value="{{ old('from_email') }}"
                                               required>
                            </div>
                            {{--replyto email--}}
                            <div class="form-group">
                                    <label class="label"> Reply to email</label>
                                        <input type="email" class="form-control"
                                               name="reply_to"
                                               value="{{ old('reply_to') }}"
                                               required>
                            </div>
                            {{--Allowed files--}}
                            <div class="form-group">
                                    <label class="label"> Allowed attachments file types</label>
                                        <input type="text" class="form-control"
                                               name="allowed_files"
                                               value="{{ old('allowed_files') }}">
                            </div>
                            {{--Brand logo--}}
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Brand Logo</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="col">
                        <h5 class="title">Brand settings</h5>
                        @include('components.errors')
                        <div class="jumbotron">
                            <h1 class="display-4">Settings here</h1>
                            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                            <hr class="my-4">
                            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
