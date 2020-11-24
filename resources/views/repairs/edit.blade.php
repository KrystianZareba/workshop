@extends('layouts.page')

@section('title')
    Edytuj naprawę
@endsection

@section('buttons')
    <a href="{{route('repairs.index')}}" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')
    {!! Form::model($repair, ['route' => ['repairs.update', $repair], 'method' => 'PUT']) !!}
        @include('repairs.form')
    {!! Form::close() !!}

    @include('includes.delete_btn', ['url' => route('repairs.destroy', $repair)])
@endsection
