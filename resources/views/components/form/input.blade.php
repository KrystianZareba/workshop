<div class="
    md-form
    @if(isset($className)) {{$className}} @endif
    @if(isset($append)) input-group @endif
    ">
    @php $value = $value ?? null; @endphp

    @include("components.form.inputs.$type")

    @if(isset($label))
        {!! Form::label($name, $label) !!}
    @endif

    @if(isset($append))
        <div class="input-group-append">
            <span class="input-group-text md-addon">
                {{$append}}
            </span>
        </div>
    @endif

    <div class="invalid-feedback">
        {{$errors->first($name)}}
    </div>
</div>
