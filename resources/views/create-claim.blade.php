@extends('master')
@section('content')

<form method='post' action='/create/save'>
@csrf

<div><input type="submit" class="btn btn-primary" value="Get Started" /></div>
</form>

@endsection

