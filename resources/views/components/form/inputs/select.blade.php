{!! Form::select(
    $name,
    $values,
    $value,
    [
        'class' => $errors->has($name) ? 'selectpicker form-control is-invalid' : 'selectpicker form-control',
        'data-live-search' => $search ?? "false"
    ]
) !!}
