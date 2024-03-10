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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('academic_year');
            $table->foreignId('religion')->references('id')->on('religions');
            $table->foreignId('blood_type')->references('id')->on('blood_types');
            $table->foreignId('nationality')->references('id')->on('nationalities');
            $table->foreignId('grade_id')->nullable()->references('id')->on('grades')->cascadeOnDelete();
            $table->foreignId('classroom_id')->nullable()->references('id')->on('classrooms')->cascadeOnDelete();
            $table->foreignId('section_id')->nullable()->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->references('id')->on('student_parents')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
