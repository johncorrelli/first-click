@extends('master')
@section('content')

<form method='post' action='/create/save-prize'>
@csrf
<input type="hidden" name="claim_id" value="{{ $claimId ?? '' }}" />

<h2>Current Prizes:</h2>
<p># of winners | Title</p>
@foreach ($prizes as $prize)
    <p>{{ $prize->getClaimsAllowed() }} | {{ $prize->getHeaderText() }}
@endforeach

<h2>Next Prize:</h2>
<div>How many people can take the prize?</div>
<div>
    <input name="max_claims" type="number" value="1" />
</div>
<div>Add a title for this prize:</div>
<div>
    <input name="text_header" type="text" value="" />
</div>
<div>Add a special message:</div>
<div>
    <textarea name='text_body' cols="50" rows="10">Congrats you won!</textarea>
</div>

<div><input type="submit" class="button button-primary" value="Create Prize" /></div>
</form>

<div>

<form method='post' action='/create/finalize-claim'>
@csrf
<input type="hidden" name="claim_id" value="{{ $claimId ?? '' }}" />
<input type="submit" class="button button-primary" value="Finalize Claim" />
</form>

</div>

@endsection
