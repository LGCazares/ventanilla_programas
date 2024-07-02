<div
    class="form-group form-group-component date {{ $col != '' ? 'col-' . $col . '' : '' }} {{ $colSm != '' ? 'col-sm-' . $colSm : '' }} {{ $colMd != '' ? 'col-md-' . $colMd : '' }} {{ $colLg != '' ? 'col-lg-' . $colLg : '' }} {{ $colXl != '' ? 'col-xl-' . $colXl : '' }} {{ $classes != '' ? $classes : '' }}">
    <label for="{{ $name }}"
        class="@if (isset($required) and $required == 'true') {{ 'required' }} @endif component__label">
        {{ $label }}
    </label>
    <div
        class="@if (!isset($labelInline)) {{ 'col-12 col-sm-7 col-lg-5 px-0 px-lg-3' }}@elseif($labelInline == 'false'){{ '' }} @endif position-relative">
        {{-- Dummy inputs for chrome (stops autocomplete fill credit card meessage) --}}
        <input name="chrome-autofill-dummy1" style='display:none' disabled />
        <input name="chrome-autofill-dummy2" style='display:none' disabled />
        <input type="text" {{ $wireModel }}
            class="form-control component component--date  {{ $inputClasses != '' ? $inputClasses : '' }} @error('' . $name . '') is-invalid @enderror"
            id="{{ $name }}" name="{{ $name != '' ? $name : '' }}"
            value='{{ old('' . $name . '', $value != '' ? $value : '') }}' onchange="this.dispatchEvent(new InputEvent('input'))" autocomplete="off" placeholder="{{ $ph }}">
    </div>
    @error('' . $name . '')
        <span class="error_form">{{ $message }}</span>
    @enderror
</div>