<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\ClaimPrize;
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

        $newClaim = Claim::create([]);

        ClaimPrize::create([
            'claim_id' => $newClaim->id,
            'claim_order' => 1,
            'claims_allowed' => $maxClaims,
            'text_header' => 'Congratulations!',
            'text_body' => $successfulText,
        ]);

        ClaimPrize::create([
            'claim_id' => $newClaim->id,
            'claim_order' => 2,
            'claims_allowed' => 0,
            'text_header' => 'Sorry!',
            'text_body' => $unsuccessfulText,
        ]);

        return view('create-claim-success')
            ->with('claimId', $newClaim->id)
        ;
    }
}
