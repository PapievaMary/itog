@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="navbar-brand"><h1>{{ $titleReport }}</h1></div>
        </div>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Warranty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($things as $thing)
                <tr>
                    <td>{{ $thing->name }}</td>
                    <td>{{ $thing->description }}</td>
                    <td>{{ $thing->wrnt }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
