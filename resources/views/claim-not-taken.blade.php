@extends('master')
@section('bg-color', 'bg-secondary')
@section('progress-bar-class', 'progress-bar-striped progress-bar-animated')
@section('content')

<p>
    <a class="btn btn-success btn-large" href="/claim/{{ $claimId }}/take">
        Claim what's yours!
    </a>
</p>

@endsection
