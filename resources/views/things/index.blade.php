@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand"><h1>My Things</h1></div>
            <div class="d-flex">
                <a class="btn btn-success" href="things/create" role="button">Create</a>
            </div>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Warranty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($things as $thing)
                <tr>
                    <td>{{ $thing->name }}</td>
                    <td>{{ $thing->description }}</td>
                    <td>{{ $thing->wrnt }}</td>
                    <td>
                        @can('transfer')
                        <a href="{{ route('things.uses', $thing->id) }}" class="btn btn-primary">Transfer</a>
                        @endcan
                        <a href="{{ route('things.edit', $thing->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('things.destroy', $thing->id) }}" method="POST" style="display:inline-block;">
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
@endsection
