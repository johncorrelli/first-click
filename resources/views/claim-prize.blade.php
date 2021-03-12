@extends('master')
@section('content')

<div class="p-3">
    <h1 class="prize-title text-center">{{ $header ?? '' }}</h1>

    <div class="markdown-body">
    {!! $text ?? '' !!}
    </div>
</div>

@endsection

