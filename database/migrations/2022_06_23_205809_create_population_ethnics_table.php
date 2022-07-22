<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopulationEthnicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('population_ethnics', function (Blueprint $table) {
            $table->id('id_population_ethnics');
            $table->unsignedBigInteger('populations_id');
            $table->unsignedBigInteger('ethnic_group_id');

            $table->foreign('ethnic_group_id')->references('id_ethnic_group')->on('ethnic_groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('populations_id')->references('id_population')->on('populations')->onDelete('cascade');
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
        Schema::dropIfExists('population_ethnics');
    }
}
