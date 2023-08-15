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
        Schema::create('past_employment_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->foreign('applicant_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('from_date_1');
            $table->string('to_date_1');
            $table->string('name_address_employer_1');
            $table->string('phone_number_1');
            $table->string('job_1');
            $table->string('reason_leaving_1');
            $table->string('from_date_2');
            $table->string('to_date_2');
            $table->string('name_address_employer_2');
            $table->string('phone_number_2');
            $table->string('job_2');
            $table->string('reason_leaving_2');
            $table->string('from_date_3');
            $table->string('to_date_3');
            $table->string('name_address_employer_3');
            $table->string('phone_number_3');
            $table->string('job_3');
            $table->string('reason_leaving_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_employment_info');
    }
};
