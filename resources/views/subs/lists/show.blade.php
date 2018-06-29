@extends('layouts.app')

@section('content')

<div class="wrap">
    <div class="home-header">
        <h2 class="inline-pc">Lists / {{ ucwords($list->name) }}</h2>
        <div class="is-right">
            <a href="{{ route('subs.create', $list->uuid) }}" class="btn btn-dark">Add Subscriber</a>
        </div>
    </div>
    <div class="home-body">
        <div class="row">
            <div class="col-sm-3 pr-2">
                
            </div>
            <div class="col">
                <span id="body-tab">Members</span>
                <hr class="mt-0 mb-0">
                @foreach($subs as $sub)
                    <div class="row ml-1 mr-1 mt-0 mb-0 pb-1">
                        <div class="col-sm-1 pt-1">
                            {{ $loop->index+1 }}
                        </div>
                        <div class="col-sm-3 pt-1">
                            <a class="has-text-primary decoration-none" href="{{ route('subs.show', [
                                    'uuid'  => $list->uuid,
                                    'email' => $sub->email
                                ]) }}">
                                {{ ucwords($sub->first_name.' '.$sub->last_name ) }}
                            </a>
                        </div>
                        <div class="col-sm-5 pt-1">
                            {{ ucwords($sub->email) }}
                        </div>
                        <div class="col-sm-1 pt-1">
                            <a class="has-text-primary decoration-none" href="{{ route('subs.show', [
                                    'uuid'  => $list->uuid,
                                    'email' => $sub->email
                                ]) }}">
                                View
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <form action="{{ route('subs.destroy', [
                                    'uuid'  => $list->uuid,
                                    'email' => $sub->email
                            ]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn mt-1 text-danger decoration-none btn-link">Delete</button>
                            </form>
                        </div>
                    </div>
                    <hr class="mt-0 mb-0 ml-1 mr-1">
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection