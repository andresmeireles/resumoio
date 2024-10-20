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
        Schema::create('resume_models', function (Blueprint $table) {
            $table->id();
            $table->string('format');
            $table->string('name');
            $table->string('content');
        });

        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('resume_model_id')->constrained();
            $table->string('first_name');
            $table->string('position');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamps();
        });

        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('job');
            $table->string('employer');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('resume_id')->constrained();
            $table->boolean('display')->default(true);
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resume_id');
            $table->string('name');
            $table->enum('proficiency', ['learning', 'beginner', 'intermediate', 'advanced', 'expert']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('resumes');
        Schema::dropIfExists('resume_models');
    }
};
