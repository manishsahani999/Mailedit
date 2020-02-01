@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4 border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">All Brands</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
                <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('brand.create') }}">
                    <span class="btn__text text-white">Create New Brand</span>
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
                    @foreach ($brands as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->brand_name}}
                                <small class="type--fade">
                                    Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                                </small>
                            </span>
                        </div>
                        <div class="accordion__content">
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{ route('brand.show', $item->slug) }}">
                                    <span class="btn__text">
                                        View
                                    </span>
                                </a>
                                <a class="btn btn--sm type--uppercase" href="{{ route('brand.edit', $item->slug) }}">
                                    <span class="btn__text">
                                        Edit
                                    </span>
                                </a>
                                <a class="btn btn--sm type--uppercase" href="" onclick="event.preventDefault();
                                        document.getElementById('delete-form--{{ $item->id }}').submit();">
                                    <span class="btn__text">
                                        Delete
                                    </span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <form id="delete-form--{{$item->id}}" class="" action="{{ route('brand.destroy', $item->slug) }}" method="post">
                        @csrf @method('DELETE')
                    </form>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection