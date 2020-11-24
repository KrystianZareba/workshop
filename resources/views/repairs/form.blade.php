<div class="row">
    <div class="col-6 offset-3 text-center">
        @include('repairs.form.select', ["name" => "car_id"])

        @include('components.form.input', ['type' => 'text', 'name' => 'description', 'label' => 'Opis'])

        @include('components.form.input', [
            'type' => 'number', 'name' => 'parts_cost', 'label' => 'Koszt części', 'step' => 0.01, 'append' => 'PLN'
        ])

        @include('components.form.input', [
            'type' => 'number', 'name' => 'repair_cost', 'label' => 'Koszt naprawy', 'step' => 0.01, 'append' => 'PLN'
        ])

        @include('components.form.input', [
            'type' => 'number', 'name' => 'repair_time', 'label' => 'Czas naprawy', 'step' => 0.01, 'append' => 'h'
        ])

        @include('components.form.input', ['type' => 'hidden', 'name' => 'created_by', 'value' => Auth::id()])

        @include('components.form.submit')
    </div>
</div>
