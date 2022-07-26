<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleArchitectureObservationResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_architecture_observation_response', function (Blueprint $table) {
            $table->id('id_multiple_architecture_observation_response');
            $table->unsignedBigInteger('multiple_architecture_observation_id')->nullable();
            $table->string('response');

            $table->foreign('multiple_architecture_observation_id')->references('id_multiple_architecture_observation')->on('multiple_architecture_observation')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multiple_architecture_observation_response');
    }
}
