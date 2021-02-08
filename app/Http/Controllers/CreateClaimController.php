<?php

namespace App\Http\Controllers;

use App\Exceptions\ClaimAlreadyPublicException;
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
        $newClaim = Claim::create(['is_public' => false]);

        return $this->returnUpdatedClaim($newClaim);
    }

    public function finalizeClaim(): View
    {
        $claimId = request()->get('claim_id');

        /**
         * @var Claim
         */
        $claim = Claim::findOrFail($claimId);

        if ($claim->getIsPublic()) {
            throw new ClaimAlreadyPublicException();
        }

        $claim->update(['is_public' => true]);
        $claim->save();

        return view('create-claim-success')
            ->with('claimId', $claimId)
        ;
    }

    public function createClaimPrize(): View
    {
        $claimId = request()->get('claim_id');

        /**
         * @var Claim
         */
        $claim = Claim::findOrFail($claimId);

        if ($claim->getIsPublic()) {
            throw new ClaimAlreadyPublicException();
        }

        $maxClaims = request()->get('max_claims') ?? 1;
        $textHeader = request()->get('text_header') ?? '';
        $textBody = request()->get('text_body') ?? '';
        $claimOrder = $claim->prizes->count() + 1;

        ClaimPrize::create([
            'claim_id' => $claimId,
            'claim_order' => $claimOrder,
            'claims_allowed' => $maxClaims,
            'text_header' => $textHeader,
            'text_body' => $textBody,
        ]);

        return $this->returnUpdatedClaim($claim);
    }

    private function returnUpdatedClaim(Claim $claim): View
    {
        $claim->refresh();

        return view('create-claim-prize')
            ->with('claimId', $claim->getKey())
            ->with('prizes', $claim->prizes->sortBy('claim_order'))
        ;
    }
}
