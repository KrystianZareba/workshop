@extends('layouts.page')

@section('title')
    Edytuj użytkownika {{ $user->name }}
@endsection

@section('buttons')
    <a href="{{route('users.index')}}" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')
    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
    @include('users.form')
    {!! Form::close() !!}

    @include('includes.delete_btn', ['url' => route('users.destroy', $user)])
@endsection
