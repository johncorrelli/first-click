@extends('master')
@section('content')

<div class="p-3">
<form method='post' action='/create/save-prize'>
    @csrf
    <input type="hidden" name="claim_id" value="{{ $claimId ?? '' }}" />

    <h3>Current Prizes:</h3>

    <table class="table table-dark table-striped">
        <caption>A collection of prizes for this Claim</caption>
        <tr>
            <th scope="col">Allowed Winners</th>
            <th scope="col">Prize Title & Details</th>
        </tr>

        @foreach ($prizes as $prize)
            <tr>
                <th scope="row">{{ $prize->getClaimsAllowed() }}</th>
                <td>
                    <div>{{ $prize->getHeaderText() }}</div>
                    @include('components/markdown', ['text' => $prize->getBodyHtml() ])
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Create the next Prize:</h3>

    @include('components/form/input', [
        'blockLevel' => true,
        'caption' => 'Number of allowed winners:',
        'type' => 'number',
        'name' => 'max_claims',
        'value' => 1
    ])

    @include('components/form/input', [
        'blockLevel' => true,
        'caption' => 'Prize title:',
        'type' => 'text',
        'name' => 'text_header',
        'value' => 'Congrats you won!'
    ])

    <div class="pt-1">
        @include('components/form/textarea', [
            'caption' => 'Add a special message:',
            'name' => 'text_body',
            'cols' => '50',
            'rows' => '10',
            'value' => 'Congrats you won!'
        ])
        <a href="https://support.teamgantt.com/article/120-markdown-formatting-for-comments/" target="_blank" rel="noopener">Style your message with markdown! See how it works!</a>
    </div>

    <div class="pt-3">
        <input type="submit" class="btn btn-primary" value="Create Prize" />
    </div>
    </form>

    <br />
    <br />

    <p>At the current time, when all claims are taken, the last one is given over and over again. We recommend that you create your "losing" prize as the last one.</p>

    <form method='post' action='/create/finalize-claim'>
        @csrf
        <input type="hidden" name="claim_id" value="{{ $claimId ?? '' }}" />
        <input type="submit" class="btn btn-success" value="All done. Finalize Claim" />
    </form>
</div>

@endsection
