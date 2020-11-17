@extends('layouts.app')

@section('container')
    <div class="container pt-4">
        <div class="row z-depth-3">
            <div class="col-12 px-0">
                @include('includes.navbar')
            </div>
            <div class="col-12 white page-content">
                <div class="row mb-2 border-bottom pb-2">
                    <div class="col-6 pl-5 pt-2">
                        <h4>@yield('title')</h4>
                    </div>
                    <div class="col-6 text-right">
                        @yield('buttons')
                    </div>
                </div>

                @yield('page-content')
            </div>
        </div>
    </div>
@endsection
