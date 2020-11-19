@extends('layouts.page')

@section('title')
    Dodaj pojazd
@endsection

@section('buttons')
    <a href="{{route('contractors.show', $contractor)}}#cars" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')
    {!! Form::open(['route' => ['cars.store', $contractor], 'method' => 'POST']) !!}
    @include('cars.form')
    {!! Form::close() !!}
@endsection
