<div class="row">
    <div class="col-6 offset-3 text-center">
        @include('components.form.input', ['type' => 'text', 'name' => 'email', 'label' => 'E-mail'])
        @include('components.form.input', ['type' => 'text', 'name' => 'name', 'label' => 'Nazwa'])

        @if(empty($user))
            @include('components.form.input', ['type' => 'password', 'name' => 'password', 'label' => 'Hasło'])
            @include('components.form.input', ['type' => 'password', 'name' => 'password_confirmation', 'label' => 'Potwierdź hasło'])
        @endif

        @include('components.form.switch', ['name' => 'admin', 'label' => 'Administrator', 'checked' => isset($user) ? $user->admin : false])
        @include('components.form.submit')
    </div>
</div>
