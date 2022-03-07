<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id('id_parameter');
            $table->unsignedBigInteger('feature_id')->nullable();
            $table->unsignedBigInteger('sample_type_id')->nullable();
            $table->String('parameter_name',100);
            $table->String('units',100);
            $table->String('expected_value',100);
            $table->String('operator',100);
            $table->foreign('feature_id')->references('id_feature')->on('features')->onDelete('set null');
            $table->foreign('sample_type_id')->references('id_sample_type')->on('sample_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
