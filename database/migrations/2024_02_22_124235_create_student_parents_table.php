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
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            //Father information
            $table->string('name_father');
            $table->string('job_father');
            $table->string('phone_father');
            $table->string('address_father');
            $table->string('national_id_father');
            $table->string('passport_id_father');
            $table->foreignId('religion_father_id')->references('id')->on('religions');
            $table->foreignId('blood_type_father_id')->references('id')->on('blood_types');
            $table->foreignId('nationality_father_id')->references('id')->on('nationalities');
            //Mother information
            $table->string('name_mother');
            $table->string('job_mother');
            $table->string('phone_mother');
            $table->string('address_mother');
            $table->string('national_id_mother');
            $table->string('passport_id_mother');
            $table->foreignId('religion_mother_id')->references('id')->on('religions');
            $table->foreignId('blood_type_mother_id')->references('id')->on('blood_types');
            $table->foreignId('nationality_mother_id')->references('id')->on('nationalities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};
