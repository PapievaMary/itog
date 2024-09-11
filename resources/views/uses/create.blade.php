@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transfer ( {{ $thing[0]->name }} )</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('things.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('uses.store') }}" method="POST">
        @csrf
        <input type="hidden" name="thing_id" value="{{$thing[0]->id}}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:</strong>
                    <div class="mb-3">
                        <select name="user_id" class="form-select" required aria-label="select example">
                        <option value="">Выберите пользователя</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">Пример обратной связи неверного выбора </div>
                    </div>
                </div>
            </div>    
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Place:</strong>
                    <div class="mb-3">
                        <select name="place_id" class="form-select" required aria-label="select example">
                        <option value="">Выберите место</option>
                        @foreach($places as $place)
                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">Пример обратной связи неверного выбора </div>
                    </div>
                </div>
            </div>    
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="text" name="amount" class="form-control" placeholder="amount">
                </div>
            </div>
        </div>    

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection