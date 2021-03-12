<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBaseClaimData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->text('company_name')->after('id')->nullable();
            $table->string('company_logo')->after('company_name')->nullable();
            $table->string('take_claim_text')->after('company_logo')->nullable();
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
            $table->dropColumn('company_name');
            $table->dropColumn('company_logo');
            $table->dropColumn('take_claim_text');
        });
    }
}
