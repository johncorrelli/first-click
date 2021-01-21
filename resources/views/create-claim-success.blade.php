@extends('master')
@section('jumbotron-class', 'jumbotron__success')
@section('content')

<h1>Almost there!</h1>
<p>You just need to share your "Claim" and let people compete for the treasure!</p>

<p class="alert alert-success"><a href='/claim/{{ $claimId }}'>Go to claim</a></p>
<p><i>don't worry - it won't take the claim.</i></p>

@endsection
