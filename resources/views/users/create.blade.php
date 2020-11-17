@extends('layouts.page')

@section('title')
    Dodaj użytkownika
@endsection

@section('buttons')
    <a href="{{route('users.index')}}" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        @include('users.form')
    {!! Form::close() !!}
@endsection
