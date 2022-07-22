<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchitectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architecture', function (Blueprint $table) {
            $table->id('id_architecture');
            $table->unsignedBigInteger('population_id')->nullable();
            $table->string('community');
            $table->string('survey_number');
            $table->string('latitude', 100);
            $table->string('altitude', 100);
            $table->foreign('population_id')->references('id_population')->on('populations')->onDelete('set null');
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
        Schema::dropIfExists('architecture');
    }
}
