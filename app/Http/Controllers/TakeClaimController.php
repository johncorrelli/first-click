<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Exceptions\ClaimNotFoundException;
use App\Exceptions\ClaimTakenException;
use Illuminate\Contracts\View\View;

class TakeClaimController extends Controller
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
