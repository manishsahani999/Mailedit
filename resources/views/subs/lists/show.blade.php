@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">{{ ucwords($list->name) }}</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
                <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('subs.create', $list->uuid) }}">
                    <span class="btn__text text-white">Add Subscriber</span>
                </a>
                <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('subs.list.upload', $list->uuid) }}">
                    <span class="btn__text text-white">Upload List</span>
                </a>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="accordion accordion-2 accordion--oneopen">
                    @foreach($subs as $sub)
                    <li>
                        <div class="accordion__title">
                            <span class="h5"> {{ $loop->index+1 }} {{ ucwords($sub->first_name.' '.$sub->last_name ) }}
                                <small class="type--fade">
                                    Created <strong>{{ $sub->created_at->diffForHumans() }}</strong>
                                </small>
                            </span>
                        </div>
                        <div class="accordion__content">
                            {{ ucwords($sub->email) }}
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{ route('subs.show', [
                                    'uuid'  => $list->uuid,
                                    'email' => $sub->email
                                ]) }}">
                                    <span class="btn__text">
                                        View
                                    </span>
                                </a>
                                <a class="btn btn--sm type--uppercase" href="" onclick="event.preventDefault();
                                        document.getElementById('delete-form--{{ $sub->id }}').submit();">
                                    <span class="btn__text">
                                        Delete
                                    </span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <form id="delete-form--{{$sub->id}}" class="" action="{{ route('subs.destroy', [
                                    'uuid'  => $list->uuid,
                                    'email' => $sub->email
                            ]) }}" method="post">
                        @csrf @method('DELETE')
                    </form>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

@endsection