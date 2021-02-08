<?php

namespace App\Http\Controllers;

use App\Exceptions\ClaimNotFoundException;
use App\Models\Claim;
use Illuminate\Contracts\View\View;

class TakeClaimController extends Controller
{
    public function checkClaim(string $claimId): View
    {
        $claim = $this->getClaim($claimId);

        return view('claim-landing')
            ->with('claimId', $claim->getKey())
        ;
    }

    public function takeClaim(string $claimId): View
    {
        $claim = $this->getClaim($claimId);
        $prize = $claim->getCurrentPrize();

        $prize->take()->save();

        return view('claim-prize')
            ->with('header', $prize->getHeaderText())
            ->with('text', $prize->getBodyText())
        ;
    }

    protected function getClaim(string $claimId): Claim
    {
        /**
         * @var Claim|null
         */
        $claim = Claim::find($claimId);

        if (null === $claim || !$claim->getIsPublic()) {
            throw new ClaimNotFoundException("{$claimId} was not found!");
        }

        return $claim;
    }
}
