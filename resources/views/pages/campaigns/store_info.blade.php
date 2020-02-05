@extends('layouts.app')


@section('content')


<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Give Info to this Campagin</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
            </div>
        </div>
    </div>
</section>


<section class="cover pb-0">
    <div class="container">
        <form action="{{ route('campaign.update.info', [$brand->slug, $campaign->uuid]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ $campaign->name ? $campaign->name : '' }}" class="form-control form-control-lg" required placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" value="{{ $campaign->subject ? $campaign->subject : '' }}" class="form-control form-control-lg" required placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control  form-control-lg" value="{{ $campaign->from_name ? $campaign->from_name : '' }}" name="from_name" required placeholder="From Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" value="{{ $campaign->from_email ? $campaign->from_email : '' }}" name="from_email" required placeholder="From Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" value="{{ $campaign->reply_to ? $campaign->reply_to : '' }}" name="reply_to" required placeholder="Reply to">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name="allowed_files" value="{{ old('allowed_files') }}" placeholder="Allowed Files">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="register_wrap">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name="query_string" value="{{ old('query_string') }}" placeholder="Query String">
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control form-control-lg" rows="9" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-dark type--uppercase">
                                <span class="btn__text text-white">Update Info</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection

@section('scripts')

@endsection