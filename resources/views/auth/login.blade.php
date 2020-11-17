@extends('layouts.app')

@section('container')
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="text-center border border-light p-5 z-depth-3 white">
                    {!! Form::open(['route' => 'login.post', 'method' => 'POST']) !!}
                        <p class="h4 mb-4">Zaloguj się</p>

                        @if($errors->has('authorization'))
                            <div class="alert alert-danger">
                                {{$errors->first('authorization')}}
                            </div>
                        @endif

                        @include('components.form.input', ['type' => 'text', 'name' => 'email', 'label' => 'E-mail', 'className' => 'pb-2'])

                        @include('components.form.input', ['type' => 'password', 'name' => 'password', 'label' => 'Hasło', 'className' => 'pb-2'])

                        <button class="btn btn-yellow btn-block my-4" type="submit">Zaloguj się</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
