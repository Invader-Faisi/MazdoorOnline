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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['Individual', 'Corporate']);
            $table->string('title');
            $table->string('location');
            $table->enum('rate', ['Fixed', 'Bid']);
            $table->text('description');
            $table->integer('job_rate')->nullable();
            $table->enum('status', ['Pending', 'Blocked', 'Active', 'Assigned', 'Done'])->default('Pending');
            $table->foreignId('employer_id')->constrained('employers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
