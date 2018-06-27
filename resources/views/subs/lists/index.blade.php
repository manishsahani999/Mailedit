@extends('layouts.app')

@section('content')

<div class="wrap">
    <div class="home-header">
        <h2 class="inline-pc">All Lists</h2>
        <div class="right-pc">
            <form action="{{ route('subs.list.store') }}" method="post" class="form-inline">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name of List" class="form-control form-inline" required>
                </div>
                <div class="form-group ml-1">
                <button class="btn n-lb-sending pl-3 pr-3" type="submit">Create new List</button>
                </div>
            </form>
        </div>
        <div class="mt-0"><span>lorem ispum dolor situm.</span></div>
    </div>
    <div class="home-body">
        <div class="row">
            <div class="col-sm-3 text-center">
                <h3>Search List</h3>
            </div>
            <div class="col">
                <span id="body-tab">All lists</span>
                <hr class="mt-0">
                <div class="n-table-wrap">
                    @foreach($lists as $list)
                        <div class="n-table row">
                            <?php
                                $count = count($list->binarySubs()->get())
                            ?>
                            <div class="col-sm-1 n-col-1">
                                <img src="{{ asset('img/paper-plane.svg') }}" alt="" class="n-col-icon">
                            </div>
                            <div class="col-sm-4 n-col-2">
                                <h5 class="mb-0">
                                    <a href="{{ route('subs.list.show', $list->uuid) }}">
                                        {{ $list->name }}
                                    </a>
                                </h5>
                                <span>something here</span>
                                <div><span>Created<strong> {{ $list->created_at->diffForHumans() }}</strong></span></div>
                            </div>
                            <div class="col-sm-2 pt-2 text-center">
                                <h3 class="mb-0">{{ $count }}</h3>
                                <span>Members</span>
                            </div>
                            <div class="col-sm-1 offset-sm-1 pt-3 mr-1">
                                <a href="{{ route('subs.list.show', $list->uuid) }}" class="btn btn-primary bt">
                                    View
                                </a>
                            </div>
                            <div class="col-sm-1 pt-3">
                                <a href="{{ route('subs.list.edit', $list->uuid) }}" class="btn n-lb-draft bt">
                                    Edit
                                </a>
                            </div>
                            <div class="col-sm-1 pt-3">
                            <form action="{{ route('subs.list.destroy', $list->uuid) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn n-lb-cancel bt">Delete</button>
                            </form>
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