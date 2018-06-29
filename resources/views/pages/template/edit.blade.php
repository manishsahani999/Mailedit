@extends('layouts.app')

@section('links')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection

@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">Templates</h2>
            <h5 class="inline-pc">/ {{ $template->name }}</h5>
            <div class="mt-1">
                <span>Good art is a Talent, Good design is a Skill.</span>
            </div>
            @include('components.sessions')
        </div>
        <div class="home-body">
            <!-- form starts -->
            <form action="{{ route('template.update', $template->uuid) }}" method="post">
                @csrf
                @method('PUT')
            <span id="body-tab">Template info</span>
            <hr class="mt-0">
            @include('components.errors')
            <div class="row">
                <div class="col-sm-4 m-t-5 text-right" id="register-left">
                    <div>
                        <img class="m-t-5" id="create-brand-icon" src="{{ asset('img/create.svg') }}" alt="">
                    </div>
                </div>
                <div class="col m-l-2" id="register-right">
                    <div class="m-t-5">
                        <h2>Edit Template</h2>
                        @include('components.errors')
                    </div>
                    <div class="register_wrap m-t-2">
                        {{--name--}}
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                name="name" value="{{ (old('name')) ? old('name') : $template->name }}"
                                required placeholder="Template Name">
                        </div>
                        {{--Subject--}}
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                    name="subject" value="{{ (old('subject')) ? old('subject') : $template->subject }}"
                                    required placeholder="Subject">
                        </div>
                        {{--Description--}}
                        <div class="form-group mb-5">
                            <label for=""><h5 class="mb-0">Description</h5></label>
                            <textarea name="description" class="form-control form-control-lg" cols="30" rows="7">{{ (old('description')) ? old('description') : $template->description }}</textarea>
                        </div>
                    </div>
                    <!-- register_wrap ends -->
                </div>
                <!-- register right ends -->
            </div>
            
            <span id="body-tab">Template Design</span>            
            <hr class="mt-0">   
            <div class="form-group">
                <textarea name="content" id="summernote" class="textarea">
                    {!! (old('content')) ? old('content') : $template->content !!}
                </textarea>
            </div>

            <div class="form-group text-center mt-5">
                <button type="submit" class="btn bt btn-template">Update This Template</button>
            </div>
            </form>
            <!-- form end -->
        </div>
        <!-- home-body end -->
    </div>
    <!-- wrap end -->
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Write something ',
                tabsize: 2,
                height: 400,
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                dialogsInBody: true,
            });

        });
    </script>
@endsection