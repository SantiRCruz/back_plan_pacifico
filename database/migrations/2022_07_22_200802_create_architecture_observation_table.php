<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchitectureObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architecture_observation', function (Blueprint $table) {
            $table->id('id_architecture_observation');
            $table->unsignedBigInteger('architecture_id')->nullable();  
            $table->string('username_house');
            $table->string('latitude', 100);
            $table->string('altitude', 100);
            $table->string('type_house');
            $table->string('accessibility');
            $table->foreign('architecture_id')->references('id_architecture')->on('architecture')->onDelete('set null');
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
        Schema::dropIfExists('architecture_observation');
    }
}
