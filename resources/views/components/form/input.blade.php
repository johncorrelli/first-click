@if ($blockLevel === true)
    <div class="form-row p-1">
@endif

<label class="sr-only">{{ $caption ?? $name ?? ''}}</label>
<div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text">{{ $caption }}</div>
    </div>

    @include('components/form/raw-input', [
        'class' => 'form-control',
        'name' => $name ?? '',
        'placeholder' => $placeholder ?? '',
        'type' => $type ?? '',
        'value' => $value ?? '',
    ])
</div>

@if ($blockLevel === true)
    </div>
@endif
