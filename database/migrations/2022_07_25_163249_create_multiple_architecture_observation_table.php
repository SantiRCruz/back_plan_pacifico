<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleArchitectureObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_architecture_observation', function (Blueprint $table) {
            $table->id('id_multiple_architecture_observation');
            $table->unsignedBigInteger('architecture_observation_id')->nullable();
            $table->unsignedBigInteger('architecture_questions_id')->nullable();

            $table->foreign('architecture_observation_id')->references('id_architecture_observation')->on('architecture_observation')->onDelete('set null');
            $table->foreign('architecture_questions_id')->references('id_architecture_questions')->on('architecture_questions')->onDelete('set null');
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
        Schema::dropIfExists('multiple_architecture_observation');
    }
}
