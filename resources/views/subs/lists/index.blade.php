@extends('layouts.app')

@section('content')

<section class="cover space--md pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">All lists</h3>
                <h3 class="type--fade">You can send campaigns by creating a brand.</h3>
                <!-- <a class="" href="{{ route('brand.create') }}">
                    <span class="btn__text text-white">Create New Brand</span>
                </a> -->
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <ul class="accordion accordion-2 accordion--oneopen">
                    @foreach($lists as $list)
                    <li>
                        <?php
                        $count = count($list->binarySubs()->get())
                        ?>
                        <div class="accordion__title">
                            <span class="h5">{{ $list->name }}
                                <small class="type--fade">
                                    Created <strong>{{ $list->created_at->diffForHumans() }}</strong>
                                </small>
                            </span>
                        </div>
                        <div class="accordion__content">
                            <div>
                                Members - {{ $count }}
                            </div>
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{ route('subs.list.show', $list->uuid) }}">
                                    <span class="btn__text">
                                        View
                                    </span>
                                </a>
                                <a class="btn btn--sm type--uppercase" href="{{ route('subs.list.edit', $list->uuid) }}">
                                    <span class="btn__text">
                                        Edit
                                    </span>
                                </a>
                                <a class="btn btn--sm type--uppercase" href="" onclick="event.preventDefault();
                                        document.getElementById('delete-form--{{ $list->id }}').submit();">
                                    <span class="btn__text">
                                        Delete
                                    </span>
                                </a>

                            </div>
                        </div>
                    </li>
                    <form id="delete-form--{{$list->id}}" action="{{ route('subs.list.destroy', $list->uuid) }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <form action="{{ route('subs.list.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name of List" class="form-control form-inline" required>
                    </div>
                    <div class="form-group">
                        <div class="input-select">
                            <select class="form-control form-control-lg" name="binary_brand_id">
                                @foreach($brand as $item)
                                <option value="{{ $item->id }}">{{ $item->brand_name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-secondary btn-dark type--uppercase" type="submit">Create new List</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection