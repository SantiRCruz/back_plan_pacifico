<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchitectureMultipleAnswerObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architecture_multiple_answer_observation', function (Blueprint $table) {
            $table->id('id_architecture_multiple_answer_observation');
            $table->unsignedBigInteger('architecture_observation_id')->nullable();       
            $table->string('question');
            $table->foreign('architecture_observation_id')->references('id_architecture_observation')->on('architecture_observation')->onDelete('set null');          
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
        Schema::dropIfExists('architecture_multiple_answer_observation');
    }
}
