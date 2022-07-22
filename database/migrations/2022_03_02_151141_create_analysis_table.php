<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis', function (Blueprint $table) {
            $table->id('id_analysis');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('population_id')->nullable();
            $table->unsignedBigInteger('sample_type_id')->nullable();
            $table->unsignedBigInteger('water_type_id')->nullable();
            $table->string('date', 200);
            $table->string('hour', 100);
            $table->string('sample_type', 100);         
            $table->string('surface_sources', 100);
            $table->string('underground_sources', 100);
            $table->string('catchment_type', 100);
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
        Schema::dropIfExists('analysis');
    }
}
