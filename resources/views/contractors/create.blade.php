@extends('layouts.page')

@section('title')
    Dodaj kontrahenta
@endsection

@section('buttons')
    <a href="{{route('contractors.index')}}" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')
    {!! Form::open(['route' => 'contractors.store', 'method' => 'POST']) !!}
    @include('contractors.form')
    {!! Form::close() !!}
@endsection
