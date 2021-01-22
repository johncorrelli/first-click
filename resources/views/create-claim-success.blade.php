@extends('master')
@section('bg-color', 'bg-light')
@section('progress-bar-class', 'text-dark')
@section('h1', 'Success!')
@section('content')

<p>
    Your claim was successfully created! To view your claim, click the button below.
    Don't worry, it will not take the claim.
</p>

<p>
    <a class="btn btn-large btn-success" href='/claim/{{ $claimId }}'>View Claim</a>
</p>

@endsection
