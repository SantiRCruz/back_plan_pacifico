<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleResponseCharacterizationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_response_characterization_data', function (Blueprint $table) {
            $table->id('id_multiple_response_characterization_data');
            $table->unsignedBigInteger('multiple_respuesta_caracterizacion_id');

            $table->string('respuesta');


            $table->foreign('multiple_respuesta_caracterizacion_id')->references('id_multiple_response')->on('multiple_response_characterization')->onDelete('set null');
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
        Schema::dropIfExists('multiple_response_characterization_data');
    }
}
