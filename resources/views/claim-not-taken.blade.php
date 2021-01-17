@extends('master')
@section('jumbotron-class', 'jumbotron__success')
@section('content')

<div>
<h1>Almost there...</h1>
<p>This claim is still available, click the button below to take what's yours!</p>
<p>
    <a href="/claim/{{ $claimId }}/take">
        <button type="button" class="btn btn-primary btn-lg">Click here to claim!</button>
    </a>
</p>

@endsection

