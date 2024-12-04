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
        Schema::create('sections', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('school_year');
            $table->integer('level');

            $table->integer('filipino_teacher_id')->nullable(true);
            $table->integer('english_teacher_id')->nullable(true);
            $table->integer('math_teacher_id')->nullable(true);
            $table->integer('science_teacher_id')->nullable(true);
            $table->integer('ap_teacher_id')->nullable(true);
            $table->integer('esp_teacher_id')->nullable(true);
            $table->integer('tle_teacher_id')->nullable(true);

            $table->integer('music_teacher_id')->nullable(true);
            $table->integer('arts_teacher_id')->nullable(true);
            $table->integer('pe_teacher_id')->nullable(true);
            $table->integer('health_teacher_id')->nullable(true);

            $table->integer('adviser_id')->nullable(true);
            $table->integer('created_by');
            $table->enum('active_flag',['Y','N'])->default('Y');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
