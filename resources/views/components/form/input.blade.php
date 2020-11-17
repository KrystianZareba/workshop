<div class="md-form @if(isset($className)) {{$className}} @endif">
    @if(!isset($value))
        @php $value = null; @endphp
    @endif

    @include("components.form.inputs.$type")

    @if(isset($label))
        {!! Form::label($name, $label) !!}
    @endif

    <div class="invalid-feedback">
        {{$errors->first($name)}}
    </div>
</div>
