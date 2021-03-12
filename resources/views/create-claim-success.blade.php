@extends('master')
@section('content')

<div class="p-3">
    <h3>Almost there!</h3>
    <p>You just need to share your "Claim" and let people compete for the treasure!</p>

    <p class="alert alert-light"><a href='/claim/{{ $claimId }}'>View Claim Landing Page</a></p>
    <p><i>don't worry - it won't take the claim.</i></p>
</div>

@endsection
