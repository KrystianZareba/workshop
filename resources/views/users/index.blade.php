@extends('layouts.page')

@section('title')
    Lista użytkowników
@endsection

@section('buttons')
    <a href="{{ route('users.create') }}" class="btn btn-md btn-success">
        Dodaj
    </a>
@endsection

@section('page-content')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>#</td>
                <td>Nazwa</td>
                <td>E-mail</td>
                <td>Admin</td>
                <td>Data utworzenia</td>
                <td class="text-center">Opcje</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@include('includes.boolean_icon', ['data' => $user->admin])</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-yellow">
                            Edytuj
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links('includes.pagination') }}
@endsection
