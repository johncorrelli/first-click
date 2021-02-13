@extends('master')
@section('jumbotron-class', 'jumbotron__success')
@section('content')

<h1>{{ $header ?? '' }}</h1>

<div>
{!! $text ?? '' !!}
</div>

@endsection

