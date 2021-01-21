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
        $successfulText = request()->get('successful_claim_text');
        $unsuccessfulText = request()->get('unsuccessful_claim_text');

        $newClaim = Claim::create([
            'successful_claim_text' => $successfulText,
            'unsuccessful_claim_text' => $unsuccessfulText,
        ]);

        return view('create-claim-success')
            ->with('claimId', $newClaim->getKey());
    }
}
