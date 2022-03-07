<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopulatedCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('populated_centers', function (Blueprint $table) {
            $table->id('id_populated_center');
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->String('populated_center_name',100);
            $table->String('populated_center_type',10);
            $table->foreign('municipality_id')->references('id_municipality')->on('municipalities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('populated_centers');
    }
}
