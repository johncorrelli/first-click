<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Exceptions\ClaimNotFoundException;
use App\Exceptions\ClaimTakenException;
use Illuminate\Contracts\View\View;

class ClaimController extends Controller
{
    public function checkClaim(string $claimId): View
    {
        $claim = $this->getClaim($claimId);

        return view('claim-not-taken')
            ->with('claimId', $claim->getKey());
    }

    public function takeClaim(string $claimId): View
    {
        $claim = $this->getClaim($claimId);

        $claim->claim()->save();

        return view('claim')
            ->with('claimId', $claim->getKey())
            ->with('copy', $claim->getSuccessfulText());
    }

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

    protected function getClaim(string $claimId): Claim
    {
        /**
         * @var Claim|null
         */
        $claim = Claim::find($claimId);

        if (null === $claim) {
            throw new ClaimNotFoundException("{$claimId} was not found!");
        }

        if (true === $claim->getIsClaimed()) {
            throw new ClaimTakenException($claim->getUnsuccessfulText());
        }

        return $claim;
    }
}
