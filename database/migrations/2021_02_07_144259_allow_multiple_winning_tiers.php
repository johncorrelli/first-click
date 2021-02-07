<?php

use App\Models\Claim;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AllowMultipleWinningTiers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('claim_prizes', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('claim_id');

            $table->integer('claim_order')->default(1);
            $table->integer('claims_allowed')->default(1);
            $table->integer('claims_taken')->default(0);

            $table->text('text_header');
            $table->text('text_body');

            $table->timestamps();

            $table->primary('id');
            $table->foreign('claim_id')->references('id')->on('claims');
        });

        $claims = Claim::all();

        foreach ($claims as $claim) {
            // Winning prize
            DB::insert(
                "INSERT INTO claim_prizes
                (id,     claim_id, claim_order, claims_allowed, claims_taken, text_header,        text_body, created_at, updated_at) VALUES
                (UUID(), ?,        1,           ?,              ?,            'Congratulations!', ?,         ?,          ?)",
                [$claim->id, $claim->max_claims, $claim->number_of_claims, $claim->successful_claim_text, $claim->created_at, $claim->updated_at]
            );

            // Losing prize
            DB::insert(
                "INSERT INTO claim_prizes
                (id,     claim_id, claim_order, claims_allowed, claims_taken, text_header, text_body, created_at, updated_at) VALUES
                (UUID(), ?,        2,           ?,              ?,            'Sorry!',    ?,         ?,          ?)",
                [$claim->id, 0, 0, $claim->unsuccessful_claim_text, $claim->created_at, $claim->updated_at]
            );
        }

        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('max_claims');
            $table->dropColumn('number_of_claims');
            $table->dropColumn('date_claimed');
            $table->dropColumn('successful_claim_text');
            $table->dropColumn('unsuccessful_claim_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Still prototyping - not worried about data on rollbacks at this point
    }
}
