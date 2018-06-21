@extends('layouts.app')

@section('links')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection

@section('content')
<form action="{{ route('campaign.store', $brand->slug) }}" method="post">
    @csrf
    @include('components.campaign_navbar')
        <div class="wrap">
            <div class="home-header">
                <h2>{{ $brand->brand_name }} / New Campaign</h2>
            </div>
        </div>
        <div class="main-heading">
            <div class="title is-inline"></div>
            <div class="title is-6 is-inline">/</div>
        </div>
        <div class="brand-body m-t-1 m-l-1">
            @include('components.errors')
            
                <div class="row">
                    <div class="col is-4">
                        {{--Select template--}}
                        <div class="form-group">
                            <label>Select Template</label>
                            <select class="form-control">
                                <option>Select template</option>
                            </select>
                        </div>
                        {{--Name--}}
                        <div class="form-group">
                                <label> Name</label>
                                <input type="text" name="name"
                                       value="{{ old('name') }}"
                                       class="form-control">

                        </div>
                        {{--subject--}}
                        <div class="form-group">
                                <label> Subject</label>
                                <input type="text" name="subject"
                                       value="{{ old('subject') }}"
                                       class="form-control">

                        </div>
                        {{--From name--}}
                        <div class="form-group">
                            <label class="label"> From name </label>
                                <input type="text" class="form-control"
                                       value="{{ old('from_name') ? old('from_name') : $brand->from_name }}"
                                       name="from_name">
                        </div>
                        {{--From email--}}
                        <div class="form-group">
                            <label class="label"> From email</label>
                                <input type="text" class="form-control"
                                       value="{{ old('from_email') ? old('from_email') : $brand->from_email }}"
                                       name="from_email">
                        </div>
                        {{--Reply to--}}
                        <div class="form-group">
                            <label class="label"> Reply to email</label>
                                    <input type="text" class="form-control"
                                           value="{{ old('reply_to') ? old('reply_to') : $brand->reply_to }}"
                                           name="reply_to">
                        </div>
                        {{--Plain text--}}
                        <div class="form-group">
                            <label class="label"> Plain text</label>
                                <textarea class="form-control" name="text" id="" rows="10">
                                    {{ old('text') }}
                                </textarea>
                        </div>
                        {{--Allowed files--}}
                        <div class="form-group">
                            <label class="label"> Allowed attachments file types </label>
                                    <input type="text" class="form-control"
                                           name="allowed_files"
                                           value="{{ old('allowed_files') }}">
                        </div>
                        {{--Brand logo--}}
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Brand logo</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="title">Html code</div>
                        {{--html--}}
                        <div class="form-group">
                            <textarea name="htmltext" id="summernote" class="textarea">
                                {{ old('htmltext') }}
                            </textarea>
                        </div>
                        {{--description--}}
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description"  class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Write something ',
                tabsize: 2,
                height: 300,
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                dialogsInBody: true,
            });
        });
    </script>
@endsection