<!-- resources/views/things/index.blade.php -->
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
                <th>Place</th>
                <th>Name</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($things as $thing)
                <tr>
                    <td>{{ $thing['place_name'] }}</td>
                    <td>{{ $thing['thing_name'] }}</td>
                    <td>{{ $thing['thing_description'] }}</td>
                    <td>{{ $thing['amount'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
