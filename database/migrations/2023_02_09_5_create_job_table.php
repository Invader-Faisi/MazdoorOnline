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
            $table->id('job_id');
            $table->string('title');
            $table->string('location');
            $table->enum('rate',['Fixed','Bid']);
            $table->text('description');  
            $table->integer('job_rate')->nullable();    
            $table->unsignedBigInteger('employer_id')->nullable();
            $table->foreign('employer_id')->references('employer_id')->on('employer');
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