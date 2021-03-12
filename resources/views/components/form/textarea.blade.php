<div class="form-group">
    <label>{{ $caption ?? $name ?? '' }}</label>
    <textarea
        class="form-control"
        name="{{ $name ?? '' }}"
        cols="{{ $cols ?? 50 }}"
        rows="{{ $rows ?? 5 }}"
    >{{ $value ?? '' }}</textarea>
</div>
