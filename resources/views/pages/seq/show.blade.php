@extends('layouts.app')

@section('content')

<section class="cover space--md pb-5 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">{{ $seq->name }}</h3>
                <h3 class="type--fade">Select Campagins to send.</h3>
            </div>
        </div>
    </div>
</section>

<section class="cover pb-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
            <ul class="accordion accordion-2 accordion--oneopen">
                    @foreach ($seq->campaign as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->name}}
                                <small>
                                    <span class="badge
                                        @if($item->status == 'draft') text-warning
                                        @elseif($item->status == 'published') text-success
                                        @else badge-dark @endif">
                                        {{ $item->status }}
                                    </span>
                                </small>
                            </span>
                        </div>
                        <div class="accordion__content">
                            <small>
                                Edited <strong>{{ $item->updated_at->diffForHumans() }}</strong>, by <strong>You</strong>
                            </small>
                            <small>
                                . Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                            </small>
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{ route('campaign.show', [
                                            'slug' => $brand->slug, 'uuid' => $item->uuid
                                            ]) }}">
                                    <span class="btn__text">
                                        View
                                    </span>
                                </a>

                                <a class="btn btn--sm type--uppercase" href="{{ route('campaign.store.info', [
                                            'slug' => $brand->slug, 
                                            'uuid' => $item->uuid
                                        ]) }}">
                                    <span class="btn__text">
                                        Edit
                                    </span>
                                </a>

                                <a class="btn btn--sm type--uppercase" href="{{ route('campaign.stats', [
                                            'slug' => $brand->slug, 
                                            'uuid' => $item->uuid
                                        ]) }}">
                                    <span class="btn__text">
                                        Stats
                                    </span>
                                </a>

                                <a class="btn btn--sm type--uppercase" href="" onclick="event.preventDefault();
                                    document.getElementById('delete-form--{{$item->uuid}}').submit();">
                                    <span class="btn__text">
                                        Delete
                                    </span>
                                </a>
                                <form id="delete-form--{{$item->uuid}}" class="" action="{{ route('campaign.destroy', [
                                            'slug' => $brand->slug,
                                            'uuid' => $item->uuid]) }}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-select">
                            <select class="form-control form-control-lg" name="lists">
                                @foreach($campaigns as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn type--uppercase">Add to Sequence</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection