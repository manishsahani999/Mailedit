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
                    <th>Subscribers</th>
                    <th>edit</th>
                    <th>Delete</th>
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
                        <td><a href="{{ route('subs.list.edit', $list->uuid) }}" class="button">Edit</a></td>
                        <td>
                            <form action="{{ route('subs.list.destroy', $list->uuid) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection