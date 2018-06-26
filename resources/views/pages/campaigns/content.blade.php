@extends('layouts.app')

@section('links')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection

@section('content')
<form action="{{ route('campaign.content.store', [
        $brand->slug,
        $campaign->uuid
    ]) }}" method="post">
    @csrf
    @method('PUT')
    @include('components.design_navbar')
<div class="wrap">
    <div class="home-header">
        <h2 class="inline-pc">{{ $brand->brand_name }}</h2>
        <h4 class="inline-pc">
            / {{ $campaign->name }} / <span class="text-">Designing<span>
        </h4>
        <div class="mt-1">
            <span>You can design, schedule, and send a campaign.</span>
        </div>
        @include('components.sessions')
        @include('components.errors')
    </div>
    <div class="home-body">
        <span id="body-tab">Email Design</span>
        <hr class="mt-0">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                <label>
                    <h5>Select template</h5> 
                </label>
                <div class="form-group">
                    <select class="form-control" id="template-select">
                        <option>Select template</option>
                        @foreach($templates as $template)
                        <option value="{{ $template->id }}">
                            {{ $template->name }}
                        </option>
                        @endforeach
                    </select>                                                    
                </div>
                </div>
            </div>
            <div class="col-sm-8">
                <h5>Design Template</h5>
                
                <ul class="nav mb-3 bb-gray" id="pills-tab" role="tablist">
                    <li class="nav-item n-nav-item">
                        <a class="nav-link n-nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Html</a>
                    </li>
                    <li class="nav-item n-nav-item">
                        <a class="nav-link n-nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Plain text</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="form-group">
                            <textarea name="html" id="summernote" class="textarea">{{ $campaign->html }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <textarea class="form-control form-control-lg" name="text" id="" rows="15">{{ ($campaign->text) ? $campaign->text : '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Write something ',
                tabsize: 2,
                height: 500,
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                dialogsInBody: true,
            });

            $('#template-select').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var id = this.value;
                $.ajax({
                    type: "GET",
                    url: '/templates/'+id+'/get',
                    success: function(data) {
                        if ((data.error)) {
                            console.log(error);
                        }
                        $("#summernote").summernote("code", data.content);
                    }
                });
            });

        });
    </script>
@endsection

