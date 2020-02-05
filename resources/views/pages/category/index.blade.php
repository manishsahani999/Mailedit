@extends('layouts.app')

@section('content')
<section class="cover space--md pb-5 mb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Categories</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
                <a class="mt-3 btn btn-secondary btn-dark type--uppercase" href="{{ route('admin.category.create') }}">
                    <span class="btn__text text-white">Create New Category</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="slider slider--columns" data-paging="true">
                    <ul class="slides is-draggable">
                        <div class="flickity-viewport">
                            <div class="flickity-slider">
                                @foreach($categories as $item)
                                <li class="col-md-3 col-6 slide is-selected text-center">
                                    <a href="">
                                        <img alt="Image" class="border--round" src="{{ $item->getFirstMediaUrl('category')}}">
                                    </a>
                                    <h5 class="mt-2 type--fade type--uppercase">{{ $item->name }}</h5>
                                </li>
                                @endforeach
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <!--end of col-->
        </div>
        <!--end row-->
    </div>
    <!--end of container-->
</section>

@endsection