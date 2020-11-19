<div class="row">
    <div class="col-6 offset-3 text-center">
        @include('components.form.input', ['type' => 'text', 'name' => 'brand', 'label' => 'Marka'])
        @include('components.form.input', ['type' => 'text', 'name' => 'model', 'label' => 'Model'])
        @include('components.form.input', ['type' => 'text', 'name' => 'registration_number', 'label' => 'Numer rejestracyjny'])
        @include('components.form.input', ['type' => 'number', 'name' => 'production_year', 'label' => 'Rok produkcji', 'min' => 1000])
        @include('components.form.input', ['type' => 'text', 'name' => 'engine', 'label' => 'Silnik'])

        @include('components.form.input', ['type' => 'hidden', 'name' => 'contractor_id', 'value' => $contractor->id])

        @include('components.form.submit')
    </div>
</div>
