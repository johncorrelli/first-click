<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AllowMultipleWinners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->integer('max_claims')->default(1)->after('is_claimed');
            $table->integer('number_of_claims')->default(0)->after('is_claimed');
        });

        DB::unprepared("UPDATE claims SET number_of_claims = max_claims");

        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('is_claimed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->boolean('is_claimed')->after('id');
        });

        DB::unprepared("UPDATE claims SET is_claimed = 1 WHERE number_of_claims > 0");

        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('max_claims');
            $table->dropColumn('number_of_claims');
        });
    }
}
