@extends('master')
@section('bg-color', 'bg-danger')
@section('h1', 'Sorry!')
@section('progress-bar-class', 'progress-bar-striped')
@section('content')

<pre class="alert alert-dark text-left text-lg">{{ $copy ?? '' }}</pre>

@endsection
