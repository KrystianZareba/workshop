@extends('layouts.page')

@section('title')
    Edytuj pojazd {{ $car->brand }} {{ $car->model }}
@endsection

@section('buttons')
    <a href="{{route('contractors.show', $contractor)}}" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')
    {!! Form::model($car, ['route' => ['cars.update', [$contractor, $car]], 'method' => 'PUT']) !!}
        @include('cars.form')
    {!! Form::close() !!}

    @include('includes.delete_btn', ['url' => route('cars.destroy', [$contractor, $car])])
@endsection
