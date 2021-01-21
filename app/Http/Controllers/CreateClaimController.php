<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Exceptions\ClaimNotFoundException;
use App\Exceptions\ClaimTakenException;
use Illuminate\Contracts\View\View;

class CreateClaimController extends Controller
{
    public function createClaimForm(): View
    {
        return view('create-claim');
    }

    public function createClaim(): View
    {
        $maxClaims = request()->get('max_claims');
        $successfulText = request()->get('successful_claim_text');
        $unsuccessfulText = request()->get('unsuccessful_claim_text');

        $newClaim = Claim::create([
            'max_claims' => $maxClaims,
            'successful_claim_text' => $successfulText,
            'unsuccessful_claim_text' => $unsuccessfulText,
        ]);

        return view('create-claim-success')
            ->with('claimId', $newClaim->getKey());
    }
}
