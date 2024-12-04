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
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->string('lrn');

            $table->string('fname');
            $table->string('mname')->nullable(true);
            $table->string('lname');
            $table->string('ext_name')->nullable(true);

            $table->enum('sex', ['M', 'F'])->default('M');
            $table->date('birthdate');

            $table->string('elem_school_name')->nullable();
            $table->string('elem_school_id')->nullable();
            $table->string('elem_school_address')->nullable();
            $table->string('citation')->nullable();
            $table->decimal('general_average', 10, 2)->default(0.00);

            $table->string('pept_rating')->nullable(true);
            $table->date('pept_date')->nullable(true);

            $table->string('als_rating')->nullable(true);
            $table->string('als_address')->nullable(true);

            $table->text('others')->nullable(true);
            $table->integer('created_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_information');
    }
};
