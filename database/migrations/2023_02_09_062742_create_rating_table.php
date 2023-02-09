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
        Schema::create('rating', function (Blueprint $table) {
            $table->id('rating_id');
            $table->integer('ratings');
            $table->unsignedBigInteger('employer_id')->nullable();
            $table->unsignedBigInteger('labour_id')->nullable();
            $table->foreign('employer_id')->references('employer_id')->on('employer');
            $table->foreign('labour_id')->references('labour_id')->on('labour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating');
    }
};
