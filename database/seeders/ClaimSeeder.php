<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Claim;

class ClaimSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
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
