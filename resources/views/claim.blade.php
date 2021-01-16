@extends('master')
@section('jumbotron-class', 'jumbotron__success')
@section('content')

<h1>You did it!</h1>
<p>You've won! Can you believe it?</p>

<pre class="alert alert-success">{{ $copy ?? '' }}</pre>

@endsection
