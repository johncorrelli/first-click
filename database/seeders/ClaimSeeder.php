<?php

namespace Database\Seeders;

use App\Models\Claim;
use Illuminate\Database\Seeder;

class ClaimSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Claim::insert([
            'id' => '111-11-111',
            'successful_claim_text' => 'You won!',
            'unsuccessful_claim_text' => 'You lost!',
        ]);
    }
}
