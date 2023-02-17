<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_jobs', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pending', 'Completed', 'Rated'])->default('Pending');
            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('labour_id')->constrained('labours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_jobs');
    }
};
