<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchitectureMultipleAnswerObservationResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architecture_multiple_answer_observation_response', function (Blueprint $table) {
            $table->id('id_architecture_multiple_answer_observation_response');
            $table->unsignedBigInteger('architecture_multiple_answer_observation_id')->nullable();
            $table->string('response');
            $table->foreign('architecture_multiple_answer_observation_id')->references('id_architecture_multiple_answer_observation')->on('architecture_multiple_answer_observation')->onDelete('set null');
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
        Schema::dropIfExists('architecture_multiple_answer_observation_response');
    }
}
