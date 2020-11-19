@extends('layouts.page')

@section('title')
    Lista kontrahentów
@endsection

@section('buttons')
    <a href="{{ route('contractors.create') }}" class="btn btn-md btn-success">
        Dodaj
    </a>
@endsection

@section('page-content')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <td>#</td>
            <td>Imię</td>
            <td>Nazwisko</td>
            <td>Data utworzenia</td>
            <td class="text-center">Opcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($contractors as $contractor)
            <tr>
                <td>{{ $contractor->id }}</td>
                <td>{{ $contractor->first_name }}</td>
                <td>{{ $contractor->last_name }}</td>
                <td>{{ $contractor->created_at }}</td>
                <td class="text-center">
                    <a href="{{ route('contractors.show', $contractor) }}" class="btn btn-sm btn-yellow">
                        Pokaż
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contractors->links('includes.pagination') }}
@endsection
