@extends('master')
@section('jumbotron-class', 'jumbotron__success')
@section('content')

<p>
    <a href="/claim/{{ $claimId }}/take">
        <button type="submit" class="btn btn-primary btn-lg">Click to see if you've won!</button>
    </a>
</p>

@endsection

