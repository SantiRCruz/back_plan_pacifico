<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleResponseCharacterizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_response_characterization', function (Blueprint $table) {
            $table->id('id_multiple_response_characterization');
            $table->unsignedBigInteger('characterization_id')->nullable();
            $table->unsignedBigInteger('architecture_questions_id')->nullable();


            $table->foreign('characterization_id')->references('id_characterization')->on('characterization')->onDelete('set null');
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
        Schema::dropIfExists('multiple_response_characterization');
    }
}
