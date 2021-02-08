@extends('master')
@section('jumbotron-class', 'jumbotron__success')
@section('content')

<p>
    <form method="post" action="/claim/{{ $claimId }}/take">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg">Click to see if you've won!</button>
    </form>
</p>

@endsection

