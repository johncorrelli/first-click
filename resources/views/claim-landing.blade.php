@extends('master')
@section('content')

<p class="check-claim text-center">
    <a href="/claim/{{ $claimId }}/take">
        <button type="submit" class="btn btn-primary btn-lg">{{ $takeClaimText }}</button>
    </a>
</p>

@endsection

