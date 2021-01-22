@extends('master')
@section('bg-color', 'bg-success')
@section('progress-bar-class', 'progress-bar')
@section('h1', 'Victory!')
@section('content')

<pre class="alert alert-dark text-left text-lg">{{ $copy ?? '' }}</pre>

@endsection
