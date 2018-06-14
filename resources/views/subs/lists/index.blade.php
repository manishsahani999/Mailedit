@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <h3 class="title is-inline">All Lists</h3>
            <div class="is-right">
                <form action="{{ route('subs.list.store') }}" method="post" class="form-inline">
                    @csrf
                    <div class="form-group">
                                <input type="text" name="name" class="form-control is-inline">
                    </div>
                    <button class="btn btn-primary" type="submit">Create new List</button>
                </form>
            </div>
        </div>
        <div class="brand-body m-t-2">
            <table class="table is-fullwidth">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Lists</th>
                    <th scope="col">Subscribers</th>
                    <th scope="col">Action</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                    <?php
                        $count = count($list->binarySubs()->get())
                    ?>
                    <tr>
                        <th>{{ $list->id }}</th>
                        <td>
                            <a href="{{ route('subs.list.show', $list->uuid) }}">
                                {{ $list->name }}
                            </a>
                        </td>
                        <td>{{ $count }}</td>
                        <td>
                            <a href="{{ route('subs.list.show', $list->uuid) }}" class="btn btn-primary">
                                View
                            </a>
                            <a href="{{ route('subs.list.edit', $list->uuid) }}" class="btn btn-primary">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('subs.list.destroy', $list->uuid) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection