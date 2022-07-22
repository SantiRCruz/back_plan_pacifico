<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characterization', function (Blueprint $table) {
            $table->id('id_characterization');
            $table->unsignedBigInteger('housing_rural_id');
            $table->string('respondent_name');
            $table->string('age ');
            $table->string('gender');
            $table->string('occupation');
            $table->string('number_household_families');
            $table->string('num_personas_vivienda');
            $table->string('num_children_0_14_housing');
            $table->string('num_children_14_18_housing');
            $table->string('num_children_18_more_housing');
            $table->string('num_older_adults_65');
            $table->string('company_minor_sleeping');
            $table->string('highest_educational_level_family');
            $table->string('time_residing_housing');
            $table->string('housing_in_space_risk');
            $table->string('housing_special_cut_material_wood');
            $table->string('home_dimensions');
            $table->string('terrain_dimensions');
            $table->string('property_with_land_crop_crias');
            $table->string('disabled_people');

            //foreing de la tabla population_ethnics
            $table->foreign('housing_rural_id')->references('id_population_ethnics')->on('population_ethnics')->onDelete('set null');
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
        Schema::dropIfExists('characterization');
    }
}
