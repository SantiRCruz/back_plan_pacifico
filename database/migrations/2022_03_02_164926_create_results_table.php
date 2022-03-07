<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id('id_result');
            $table->unsignedBigInteger('analysis_id')->nullable();
            $table->unsignedBigInteger('parameter_id')->nullable();
            $table->foreign('analysis_id')->references('id_analysis')->on('analysis')->onDelete('set null');
            $table->foreign('parameter_id')->references('id_parameter')->on('parameters')->onDelete('set null');
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
        Schema::dropIfExists('results');
    }
}
