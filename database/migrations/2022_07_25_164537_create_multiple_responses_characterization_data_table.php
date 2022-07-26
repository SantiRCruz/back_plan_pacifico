<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleResponsesCharacterizationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_responses_characterization_data', function (Blueprint $table) {
            $table->id('id_multiple_responses_characterization_data');
            $table->unsignedBigInteger('multiple_response_characterization_id')->nullable();
            $table->string('response');


            $table->foreign('multiple_response_characterization_id')->references('id_multiple_response_characterization')->on('multiple_response_characterization')->onDelete('set null');
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
        Schema::dropIfExists('multiple_responses_characterization_data');
    }
}
