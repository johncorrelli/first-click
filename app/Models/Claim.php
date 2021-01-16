<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\UuidTrait;
use Carbon\Carbon;

class Claim extends Model
{
    use UuidTrait;

    public $incrementing = false;

    protected $fillable = [
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
        $this->setClaimed(true);
        $this->setDateClaimed(Carbon::now());

        return $this;
    }

    public function getIsClaimed(): bool
    {
        return $this->is_claimed;
    }

    public function getSuccessfulText(): string
    {
        return $this->successful_claim_text;
    }

    public function getUnsuccessfulText(): string
    {
        return $this->unsuccessful_claim_text;
    }

    protected function setClaimed(bool $isClaimed): self
    {
        $this->is_claimed = $isClaimed;

        return $this;
    }

    protected function setDateClaimed(Carbon $date): self
    {
        $this->date_claimed = $date;

        return $this;
    }
}
