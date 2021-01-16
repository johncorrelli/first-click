@extends('master')
@section('jumbotron-class', 'jumbotron__failed')
@section('content')

<h1>Well this stinks!</h1>
<p>Looks like someone got here first.</p>

<pre class="alert alert-warning">{{ $copy ?? '' }}</pre>

@endsection
