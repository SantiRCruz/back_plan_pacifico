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
            $table->id('id_multiple_response');
            $table->unsignedBigInteger('characterization_id');
            $table->unsignedBigInteger('housing_with_different_spaces');
            $table->unsignedBigInteger('patio_use');
            $table->unsignedBigInteger('people_sleeping_per_room');
            $table->unsignedBigInteger('family_productive_vocation');
            $table->unsignedBigInteger('sources_financing');
            $table->unsignedBigInteger('type_trend_housing');
            $table->unsignedBigInteger('type_risk_prone_housing');
            $table->unsignedBigInteger('origin_housing');
            $table->unsignedBigInteger('family_acquisitive_priority_management');
            $table->unsignedBigInteger('type_of_wood_when_building');
            $table->unsignedBigInteger('animals_raised');
            $table->unsignedBigInteger('cultivated_plants');
            $table->unsignedBigInteger('type_disability');
            $table->unsignedBigInteger('public_services_acquired_housing');
            $table->unsignedBigInteger('provenance_water');
            $table->unsignedBigInteger('fuel_type_when_cooking');
            $table->unsignedBigInteger('forma_de_retiro_residuos');
            $table->unsignedBigInteger('availability_media_communication');
            $table->unsignedBigInteger('ailment_health_problems');
            $table->unsignedBigInteger('types_sanitation_system');
            $table->unsignedBigInteger('service_infrastructure');
            //foreing de multiple_response
            $table->foreign('characterization_id')->references('id_characterization')->on('characterization')->onDelete('set null');
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
