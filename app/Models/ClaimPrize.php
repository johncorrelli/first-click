<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $claim_id
 * @property int    $claims_taken
 * @property int    $claims_allowed
 * @property string $text_header
 * @property string $text_body
 * @property string $created_at
 * @property string $updated_at
 */
class ClaimPrize extends Model
{
    use UuidTrait;

    public $incrementing = false;

    protected $fillable = ['claim_id', 'claims_allowed', 'claims_taken', 'claim_order', 'text_header', 'text_body'];

    public function claim(): BelongsTo
    {
        return $this->belongsTo(Claim::class);
    }

    public function getClaimsTaken(): int
    {
        return $this->claims_taken;
    }

    public function getClaimsAllowed(): int
    {
        return $this->claims_allowed;
    }

    public function getHeaderText(): string
    {
        return $this->text_header;
    }

    public function getBodyText(): string
    {
        return $this->text_body;
    }

    public function take(): self
    {
        ++$this->claims_taken;

        return $this;
    }
}
