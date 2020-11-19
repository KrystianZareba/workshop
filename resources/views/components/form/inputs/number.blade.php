{!! Form::number($name, $value, [
    'class' => $errors->has($name) ? 'form-control is-invalid' : 'form-control',
    'min' => isset($min) ? $min : 0
]) !!}
