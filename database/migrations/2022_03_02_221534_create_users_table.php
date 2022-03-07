<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->string('user_nick', 100)->unique();
            $table->string('password', 100);
            $table->string('usernames', 200);
            $table->string('user_last_names', 200);
            $table->string('phone_number',50)->unique();
            $table->string('email',200)->unique();
            $table->string('identification', 50)->unique();
            $table->foreign('profile_id')->references('id_profile')->on('profiles')->onDelete('set null');
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
        Schema::dropIfExists('users');
    }
}
