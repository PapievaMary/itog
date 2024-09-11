<!-- resources/views/things/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand"><h1>Place</h1></div>
            <div class="d-flex">
                <a class="btn btn-success" href="{{ route('places.create') }}" role="button">Create</a>
            </div>
        </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Repair</th>
                <th>Work</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
                <tr>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->description }}</td>
                    <td>{{ $place->repair }}</td>
                    <td>{{ $place->work }}</td>
                    <td>
                        <a href="{{ route('places.edit', $place->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('places.destroy', $place->id) }}" method="POST" style="display:inline-block;">
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
