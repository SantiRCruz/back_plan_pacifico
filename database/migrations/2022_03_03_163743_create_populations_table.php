<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('populations', function (Blueprint $table) {
            $table->id('id_population');
            $table->unsignedBigInteger('populated_center_id')->nullable();
            $table->unsignedBigInteger('ethnic_group_id')->nullable();
            $table->string('length', 100);
            $table->string('latitude', 100);
            $table->string('altitude', 100);
            $table->text('photography');
            $table->string('inhabitants_number', 100);
            $table->string('surface_sources', 100);
            $table->string('underground_sources', 100);
            $table->string('catchment_type', 100);
            $table->foreign('populated_center_id')->references('id_populated_center')->on('populated_centers')->onDelete('set null');
            $table->foreign('ethnic_group_id')->references('id_ethnic_group')->on('ethnic_groups')->onDelete('set null');
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
        Schema::dropIfExists('populations');
    }
}
