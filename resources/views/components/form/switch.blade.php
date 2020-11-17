@php $randomId = Str::random(10) @endphp

<div class="custom-control custom-switch mb-4">
    <input type="checkbox" value="1" name="{{ $name }}" class="custom-control-input" id="{{ $randomId }}" @if($checked) checked @endif>
    <label class="custom-control-label" for="{{ $randomId }}">{{ $label }}</label>
</div>
