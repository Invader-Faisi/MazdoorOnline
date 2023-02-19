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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('ratings');
            $table->enum('rating_by', ['Employer', 'Labour']);
            $table->foreignId('labour_id')->constrained('labours');
            $table->foreignId('employer_id')->constrained('employers');
            $table->foreignId('assigned_job_id')->constrained('assigned_jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
