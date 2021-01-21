<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\UuidTrait;
use Carbon\Carbon;

/**
 * @property string $id
 * @property int $number_of_claims
 * @property int $max_claims
 * @property string $date_claimed
 * @property string $successful_claim_text
 * @property string $unsuccessful_claim_text
 * @property string $created_at
 * @property string $updated_at
 */
class Claim extends Model
{
    use UuidTrait;

    public $incrementing = false;

    protected $fillable = [
        'max_claims',
        'successful_claim_text',
        'unsuccessful_claim_text',
    ];

    /**
     * @var array<string>
     */
    protected $casts = [
        'is_claimed' => 'bool',
    ];

    public function claim(): self
    {
        $currentClaims = $this->getNumberOfClaims();

        $this->setNumberOfClaims(++$currentClaims);
        $this->setDateClaimed(Carbon::now());

        return $this;
    }

    public function getNumberOfClaims(): int
    {
        return $this->number_of_claims;
    }

    public function isClaimable(): bool
    {
        return $this->number_of_claims < $this->max_claims;
    }

    public function getSuccessfulText(): string
    {
        return $this->successful_claim_text;
    }

    public function getUnsuccessfulText(): string
    {
        return $this->unsuccessful_claim_text;
    }

    protected function setNumberOfClaims(int $nextClaims): self
    {
        $this->number_of_claims = $nextClaims;

        return $this;
    }

    protected function setDateClaimed(Carbon $date): self
    {
        $this->date_claimed = $date;

        return $this;
    }
}
