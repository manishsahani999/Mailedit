@extends('layouts.app')


@section('content')
    <div class="wrap">
        <div class="home-header">
            <h2 class="inline-pc">Templates</h2>
            <div class="right-pc">
                <a href="{{ route('template.create') }}" class="btn btn-dark bt">Create and design a new Template</a>
            </div>
            <div class="mt-1">
                <span>Template make your email more powerful.</span>
            </div>
            @include('components.sessions')
        </div>
        <div class="home-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="p-3">
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
                                <i class="far fa-clock mr-2 home-sidebar-icon"></i> lorem
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
                                <i class="fas fa-arrow-right mr-2 home-sidebar-icon"></i> lorem
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
                                <i class="fas fa-edit mr-2 home-sidebar-icon"></i> lorem
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="" class="home-sidebar text-dark">
                                <i class="fas fa-check mr-2 home-sidebar-icon"></i> lorem
                            </a>
                        </div>
                    </div>
                    <hr class="mr-5">
                </div>
                <div class="col">
                    <span id="body-tab">All templates</span>
                    <hr class="mt-0">
                    <div class="n-table-wrap">
                        @foreach($templates as $template)
                        <div class="n-table row">
                                <div class="col-sm-1 n-col-1">
                                    <img class="n-col-icon" src="{{ asset('img/paper-plane.svg') }}" alt="">
                                </div>
                                <div class="col-sm-5 n-col-2">
                                    <h5 class="mb-0">
                                        <a href="{{ route('template.show', $template->uuid) }}">
                                            {{ (strlen($template->name)> 20) ? substr($template->name, 0 , 20) : $template->name }}
                                        </a>
                                    </h5>
                                    <span>Something here</span>
                                    <div>
                                        <span>
                                            Created <strong>{{ $template->created_at->diffForHumans() }}</strong> by {{ Auth::user()->name }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3 offset-sm-3 pt-3">
                                    <a href="{{ route('template.edit', [
                                            'uuid' => $template->uuid 
                                        ]) }}" class="btn n-lb-draft bt">Edit</a>
                                    <a href="" class="btn n-lb-cancel bt">Delete</a>
                                </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection