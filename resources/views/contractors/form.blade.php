<div class="row">
    <div class="col-6 offset-3 text-center">
        @include('components.form.input', ['type' => 'text', 'name' => 'first_name', 'label' => 'Imię'])
        @include('components.form.input', ['type' => 'text', 'name' => 'last_name', 'label' => 'Nazwisko'])

        @include('components.form.submit')
    </div>
</div>
