<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id('id_sample');
            $table->unsignedBigInteger('parameter_id')->nullable();
            $table->unsignedBigInteger('analysis_id')->nullable();
            $table->string('average', 70);
            $table->foreign('parameter_id')->references('id_parameter')->on('parameters')->onDelete('set null');
            $table->foreign('analysis_id')->references('id_analysis')->on('analysis')->onDelete('set null');
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
        Schema::dropIfExists('samples');
    }
}
