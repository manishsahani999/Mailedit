@extends('layouts.app')

@section('content')
<section class="cover space--md pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-0" style="font-size: 3rem;">Create New Category</h3>
                <h3 class="type--fade">Lorem Ispum blah blah biliner here.</h3>
                <!-- <a class="btn btn-secondary btn-dark type--uppercase" href="{{ route('brand.create') }}">
                    <span class="btn__text text-white">Go Back</span>
                </a> -->
            </div>
        </div>
    </div>
</section>

<section class="cover space--md pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col m-l-2" id="register-right">
                            <div class="register_wrap m-t-2">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name') }}" required placeholder="Category Name">
                                </div>

                                <div class="form-group">
                                    <input type="file" class="form-control form-control-lg" name="image" value="{{ old('image') }}" required placeholder="Category Image">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-dark type--uppercase">
                                    <span class="btn__text text-white">Create new Category</span>
                                    </button>
                                </div>
                            </div>
                            <!-- register_wrap ends -->
                        </div>
                        <!-- register right ends -->
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-center hidden-xs">
                <img class="image--md" src="{{ asset('img/create.svg') }}" alt="">
            </div>
        </div>
    </div>
</section>

@endsection