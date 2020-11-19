@extends('layouts.page')

@section('title')
    Podgląd kontrahenta {{ $contractor->first_name }} {{ $contractor->last_name }}
@endsection

@section('buttons')
    <a href="{{route('contractors.index')}}" class="btn btn-primary btn-md">Wróć</a>
@endsection

@section('page-content')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="preview-tab" data-toggle="tab" href="#preview" role="tab">Podgląd</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab">Edytuj</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cars-tab" data-toggle="tab" href="#cars" role="tab">Pojazdy</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="preview" role="tabpanel">
            <div class="row py-4">
                <div class="col-6">
                    <h4>Imię</h4>
                    {{ $contractor->first_name }}
                </div>
                <div class="col-6">
                    <h4>Nazwisko</h4>
                    {{ $contractor->last_name }}
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="edit" role="tabpanel">
            @include('contractors.edit')
        </div>
        <div class="tab-pane fade" id="cars" role="tabpanel">
            @include('cars.index', ['cars' => $contractor->cars])
        </div>
    </div>
@endsection
