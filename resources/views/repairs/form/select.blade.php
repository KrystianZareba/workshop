<div class="mb-3">
    <select class="selectpicker w-100" data-live-search="true" name="{{ $name }}">
        <option @if(!isset($repairt)) selected @endif>Wybierz samochód</option>
        @foreach($contractors as $contractor)
            <optgroup label="{{ $contractor->first_name }} {{ $contractor->last_name }}">
                @foreach($contractor->cars as $car)
                    <option value="{{ $car->id }}" @if(isset($repair) && $repair->car_id === $car->id) selected @endif>
                        {{ $car->brand->name }} {{ $car->model }} | {{ $car->registration_number }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    </select>

    <div class="invalid-feedback @if($errors->has($name)) d-block @endif">
        {{$errors->first($name)}}
    </div>
</div>
