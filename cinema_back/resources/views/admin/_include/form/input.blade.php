<div class="">
    @isset($label)
        <label for="{{ $data }}">
            {{ $label }}
            @isset($required) <span class="text-danger">*</span> @endisset
        </label>
    @endisset

    <input
        type="{{ $type ?? 'text' }}"
        @isset($id) id="{{ $id }}" @else id="{{ $data }}" @endisset
        @isset($name) name="{{ $name }}" @else name="{{ $data }}" @endisset
        @isset($class) class="{{ $class }}" @else class="form-control" @endisset
        @isset($value) value="{{ $value }}" @else value="{{ $item->$data ?? old($data) }}" @endisset
        @isset($pattern) pattern="{{ $pattern }}" @else @isset($length) pattern="[\D\d\s]{2,{{ $length }}}" @else pattern="[\D\d\s]{2,190}" @endisset @endisset
        @isset($length) length="{{ $length }}" @endisset
        @isset($max) max="{{ $max }}" @endisset
        @isset($min) min="{{ $min }}" @endisset

        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        @isset($required) required @endisset
        @isset($other) {{ $other }} @endisset
    >
</div>

@php
    $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
@endphp
