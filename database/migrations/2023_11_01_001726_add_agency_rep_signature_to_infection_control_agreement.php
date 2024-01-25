<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('infection_control_agreement', function (Blueprint $table) {
            $table->string('agency_rep_signature')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('infection_control_agreement', function (Blueprint $table) {
            $table->dropColumn('agency_rep_signature');
        });
    }
};
