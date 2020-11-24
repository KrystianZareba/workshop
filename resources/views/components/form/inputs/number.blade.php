{!! Form::number($name, $value, [
    'class' => $errors->has($name) ? 'form-control is-invalid' : 'form-control',
    'min' => $min ?? 0,
    'step' => $step ?? 1
]) !!}
