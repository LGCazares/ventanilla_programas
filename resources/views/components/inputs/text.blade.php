<div class="{{ $container__classes }}">
    @if ($isDataList)
        <dl class="{{ $descriptive_list__classes }}">
            <dt class="{{ $term__classes }}">{{ $label }}</dt>
            <dd id="{{ $name }}" class="{{ $description__classes }}">{{ $value }}</dd>
        </dl>
    @else
        @isset($tooltip)
            <label for="{{ $name }}" class="{{ $label__classes }}"> {{ $label }}
                <i class="{{ $tooltip__classes }} " data-toggle="tooltip" data-placement="top"
                    title="{{ $tooltip }}"></i>
            </label>
        @else
            <label for="{{ $name }}" class="{{ $label__classes }}">{{ $label }}</label>
        @endisset
        @isset($posfijo)
            <div class="d-flex align-items-center">
                <input type="{{ $type == 'text' || 'tel' ? 'text' : $type }}" name="{{ $name }}"
                    id="{{ $id }}" class="{{ $element__classes }} @error($name) 'is-invalid' @enderror"
                    value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
                    {{ $pattern != '' ? 'pattern="' . $pattern . '"' : '' }}
                    {{ $type == 'phone' ? 'inputmode="tel"' : '' }} @required($required) @readonly($readonly)
                    maxlength="{{ @$maxlength }}">
                <div class="{{ $posfijo__classes }} "> {{ $posfijo }} </div>
            </div>
        @else
            <input type="{{ $type == 'text' || 'tel' ? 'text' : $type }}" {{ $wireModel }} name="{{ $name }}"
                id="{{ $id }}" class="{{ $element__classes }} @error($name) 'is-invalid' @enderror"
                value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}"
                {{ $pattern != '' ? 'pattern="' . $pattern . '"' : '' }} {{ $type == 'phone' ? 'inputmode="tel"' : '' }}
                @required($required) @readonly($readonly) maxlength="{{ @$maxlength }}">
        @endisset
        @error($name)
            <span class="error_form">{{ $message }}</span>
        @enderror
    @endif
</div>