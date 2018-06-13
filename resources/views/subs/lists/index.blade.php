@extends('layouts.app')

@section('content')
    <div class="wrap">
        <div class="main-heading">
            <div class="title is-inline">All Lists</div>
            <div class="is-right">
                <form action="{{ route('subs.list.store') }}" method="post">
                    @csrf
                    <div class="field">
                        <div class="control">
                            <label class="label">
                                <input type="text" name="name" class="input is-inline">
                                <button class="button" type="submit">Create new List</button>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="brand-body m-t-2">
            <table class="table is-fullwidth">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Lists</th>
                    <th>edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lists as $list)
                    <tr>
                        <th>{{ $list->id }}</th>
                        <td>
                            <a href="{{ route('subs.list.show', $list->uuid) }}">
                                {{ $list->name }}
                            </a>
                        </td>
                        <td><a href="" class="button">Edit</a></td>
                        <td><a href="" class="button">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection