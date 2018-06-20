@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <h3 class="title is-inline">{{ $list->name }}</h3>
            <div class="is-right">
                <a href="{{ route('subs.create', $list->uuid) }}" class="btn btn-dark">Add Subscriber</a>
            </div>
        </div>
        <hr class="m-t-2">
        <div class="brand-body row is-flex-wrap">
            @foreach($subs as $sub)
                <div class="box col-sm-2">
                    <div>
                        <a class="has-text-primary decoration-none" href="{{ route('subs.show', [
                                'uuid'  => $list->uuid,
                                'email' => $sub->email
                            ]) }}">
                            {{ ucwords($sub->first_name.' '.$sub->last_name ) }}
                        </a>
                    </div>
                    <div class="m-b-1">{{ ucwords($sub->email) }}</div>
                    <div>
                        <form action="{{ route('subs.destroy', [
                                'uuid'  => $list->uuid,
                                'email' => $sub->email
                        ]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection