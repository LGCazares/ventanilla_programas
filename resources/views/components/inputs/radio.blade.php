<div class="{{ $container__classes }}">
    <label for="{{ $name }}" class="{{ $label__classes }}">{{ $label }}</label>
    <div class="input-group">
        <label for="{{ $name }}-first" class="{{ $element__label__classes }}">
            <input type="radio" {{ $wireModel }} name="{{ $name }}" id="{{ $name }}-first"
                class="{{ $element__classes }}" value="{{ $firstValue }}" @required($required)
                @if (old($name, @$value) == $firstValue ) checked @endif>
            {{ $firstLabel }}
        </label>
        <label for="{{ $name }}-last" class="{{ $element__label__classes }}">
            <input type="radio" {{ $wireModel }} name="{{ $name }}" id="{{ $name }}-last"
                class="{{ $element__classes }}" value="{{ $lastValue }}" @required($required)
                @if (old($name, @$value) == $lastValue ) checked @endif>
            {{ $lastLabel }}
        </label>
    </div>
    @error($name)
        <span class="error_form">{{ $message }}</span>
    @enderror
</div>