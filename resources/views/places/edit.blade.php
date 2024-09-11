@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Place</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('places.index') }}"> Back</a>
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

    <form action="{{ route('places.update', $places->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $places->name }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description">{{ $places->description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Repair:</strong>
                <select name="repair" class="form-select" aria-label="Пример выбора по умолчанию">
                    <option selected>Откройте это меню выбора</option>
                    <option
                    @if ($places->repair === 0)
                        selected
                    @endif
                    value="0">Repair</option>
                    <option 
                    @if ($places->repair === 1)
                        selected
                    @endif
                    value="1">Washing</option>
                  </select>
                </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Work:</strong>
                <select name="work" class="form-select" aria-label="Пример выбора по умолчанию">
                    <option selected>Откройте это меню выбора</option>
                    <option 
                    @if ($places->work === 0)
                        selected
                    @endif
                    value="0">Waiting</option>
                    <option 
                    @if ($places->work === 1)
                        selected
                    @endif                   
                    value="1">Working</option>
                  </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection