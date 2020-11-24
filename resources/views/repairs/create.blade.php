@extends('layouts.page')

@section('title')
    Dodaj naprawę
@endsection

@section('buttons')
    <a href="{{route('repairs.index')}}" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')
    {!! Form::open(['route' => 'repairs.store', 'method' => 'POST']) !!}
        @include('repairs.form')
    {!! Form::close() !!}
@endsection
