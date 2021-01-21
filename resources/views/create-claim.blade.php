@extends('master')
@section('content')

<form method='post' action='/create/save'>
@csrf

<h2>1st place prize:</h2>
<div>How many people can take the claim?</div>
<div>
    <input name="max_claims" type="number" value="1" />
</div>
<div>What you want a person to see when they are the first to claim the reward.</div>
<div>
    <textarea name='successful_claim_text' cols="50" rows="10">Congrats you won!</textarea>
</div>

<h2>Losing prize:</h2>
<div>What a person will see when someone else has already taken the claim.</div>
<div>
    <textarea name='unsuccessful_claim_text' cols="50" rows="10">Sorry, this has already been claimed!</textarea>
</div>

<div><input type="submit" class="button button-primary" value="Create Claim" /></div>
</form>

@endsection

