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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->references('id')->on('students')->cascadeOnDelete();
            $table->foreignId('from_grade')->nullable()->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('to_grade')->nullable()->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('from_classroom')->nullable()->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('to_classroom')->nullable()->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('from_section')->nullable()->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('to_section')->nullable()->references('id')->on('sections')->cascadeOnDelete();
            $table->string('academic_year');
            $table->string('academic_year_new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
