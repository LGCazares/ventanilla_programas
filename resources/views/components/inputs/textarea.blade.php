<div class="{{ $container__classes }}">
    <label for="{{ $name }}" class="{{ $label__classes }}">{{ $label }}</label>
    <textarea class="{{ $element__classes }} @error($name) 'is-invalid' @enderror" {{ $wireModel }} name="{{ $name }}" id="{{ $name }}" rows="5" @required($required) @readonly($readonly) maxlength="{{ @$maxlength }}" placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    @error('' . $name . '')
        <span class="error_form">{{ $message }}</span>
    @enderror
</div>