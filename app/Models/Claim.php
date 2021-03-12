<?php

namespace App\Models;

use App\Exceptions\ClaimNotFoundException;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 * @property string $created_at
 * @property string $updated_at
 */
class Claim extends Model
{
    use UuidTrait;

    public $incrementing = false;

    protected $fillable = [
        'company_name',
        'company_logo',
        'take_claim_text',
        'is_public',
    ];

    /**
     * @var array<string>
     */
    protected $casts = [
        'is_public' => 'bool',
    ];

    public function prizes(): HasMany
    {
        return $this->hasMany(ClaimPrize::class);
    }

    public function getCurrentPrize(): ClaimPrize
    {
        /**
         * @var Collection<ClaimPrize>
         */
        $prizes = $this->prizes->sortBy('claim_order');

        if ($prizes->isEmpty()) {
            throw new ClaimNotFoundException();
        }

        /**
         * @var Collection<ClaimPrize>
         */
        $availablePrizes = $prizes->filter(
            fn (ClaimPrize $prize) => $prize->getClaimsTaken() < $prize->getClaimsAllowed()
        );

        if ($availablePrizes->isEmpty()) {
            /**
             * @var ClaimPrize
             */
            return $prizes->last();
        }

        /**
         * @var ClaimPrize
         */
        return $availablePrizes->first();
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function getCompanyLogo(): ?string
    {
        return $this->company_logo;
    }

    public function getTakeClaimText(): string
    {
        return $this->take_claim_text ?? "Click to see if you've won!";
    }

    public function getIsPublic(): bool
    {
        return $this->is_public;
    }
}
