@extends('layouts.page')

@section('title')
    Zmień swoje hasło
@endsection

@section('page-content')
    {!! Form::model($user, ['route' => 'updatePassword', 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-6 offset-3 text-center">
                @include('components.form.input', ['type' => 'password', 'name' => 'old_password', 'label' => 'Aktualne hasło'])
                @include('components.form.input', ['type' => 'password', 'name' => 'password', 'label' => 'Nowe hasło'])
                @include('components.form.input', ['type' => 'password', 'name' => 'password_confirmation', 'label' => 'Potwierdź hasło'])

                @include('components.form.submit')
            </div>
        </div>
    {!! Form::close() !!}
@endsection
