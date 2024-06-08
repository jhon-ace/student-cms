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
        
        Schema::create('deans', function (Blueprint $table) {
            $table->id();
            $table->string('dean_fullname')->unique();
            $table->string('dean_status');
            $table->unsignedBigInteger('department_id')->unique(); // Ensure department_id is unique
            $table->timestamps();
            
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
        
        // Schema::create('deans', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('dean_fullname');
        //     $table->string('dean_status');
        //     $table->unsignedBigInteger('department_id'); // Column to hold department ID
        //     $table->foreign('department_id')->references('id')->on('departments'); // Define foreign key
        //     $table->timestamps();
        // });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deans');
    }
};
