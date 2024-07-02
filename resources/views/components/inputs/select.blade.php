<div class="{{ $container__classes }}">
    <label for="{{ $name }}" class="{{ $label__classes }}">{{ $label }}</label>
    <div class="input-group">
        <select {{ $wireModel }} name="{{ $name }}" id="{{ $name }}"
            class="{{ $element__classes }} @error($name) 'is-invalid' @enderror" @required($required) @if($multiple) multiple="multiple" @endif>
            <option value="">{{ $firstOption }}</option>
            @if(isset($catalog))
                @forelse ($catalog as $element)
                    <option value="{{ $element->$catalogId }}"
                        {{ old($name, $value) == $element->$catalogId ? 'selected' : '' }}>
                        {{ $element[$catalogDescription] }}</option>
                @empty
                    <option value="">No hay elementos en el catálogo</option>
                @endforelse
            @endif
        </select>
        <div class="input-group-append">
            <span id="input-group-text-{{ $name }}" class="input-group-text">
                <img src="{{ asset('images/icons/chevron-group.svg') }}" alt="Flecha">
            </span>
        </div>
    </div>
    @error($name)
        <span class="error_form">{{ $message }}</span>
    @enderror
</div>