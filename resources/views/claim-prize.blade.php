@extends('master')
@section('jumbotron-class', 'jumbotron__success')
@section('content')

<h1>{{ $header ?? '' }}</h1>

<pre class="alert alert-light">{{ $text ?? '' }}</pre>

@endsection

