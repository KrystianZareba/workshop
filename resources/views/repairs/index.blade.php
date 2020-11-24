@extends('layouts.page')

@section('title')
    Lista napraw
@endsection

@section('buttons')
    <a href="{{ route('repairs.create') }}" class="btn btn-md btn-success">
        Dodaj
    </a>
@endsection

@section('page-content')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <td>#</td>
            <td>Nr rejestracyjny</td>
            <td>Kontrahent</td>
            <td>Data naprawy</td>
            <td>Opis</td>
            <td>Czas</td>
            <td>Koszt</td>
            <td>Wprowadzdone przez</td>
            <td class="text-center">Opcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($repairs as $repair)
            <tr>
                <td>{{ $repair->id }}</td>
                <td>{{ $repair->car->registration_number }}</td>
                <td>{{ $repair->car->contractor->first_name }} {{ $repair->car->contractor->last_name }}</td>
                <td>{{ $repair->created_at }}</td>
                <td>{{ $repair->description }}</td>
                <td>{{ $repair->repair_time }}h</td>
                <td>
                    {{ $repair->repair_cost + $repair->parts_cost }} PLN
                </td>
                <td>{{ $repair->createdBy->name }}</td>
                <td class="text-center">
                    <a href="{{ route('repairs.edit', $repair) }}" class="btn btn-sm btn-yellow">
                        Edytuj
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $repairs->links('includes.pagination') }}
@endsection
