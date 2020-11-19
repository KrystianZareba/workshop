<div class="row">
    <div class="col-12 text-right py-2">
        <a href="{{ route('cars.create', $contractor) }}" class="btn btn-md btn-success">
            Dodaj
        </a>
    </div>
    <div class="col-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <td>#</td>
                <td>Marka</td>
                <td>Model</td>
                <td>Numer rejestracyjny</td>
                <td>Rok produkcji</td>
                <td>Silnik</td>
                <td>Data utworzenia</td>
                <td class="text-center">Opcje</td>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->registration_number }}</td>
                    <td>{{ $car->production_year }}</td>
                    <td>{{ $car->engine }}</td>
                    <td>{{ $car->created_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('cars.edit', [$contractor, $car]) }}" class="btn btn-sm btn-yellow">
                            Edytuj
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
