<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('ssn')->unique();
            $table->string('address');
            $table->string('provider');
            $table->date('last_visit');
            $table->string('token')->unique();
            $table->timestamp('auth_sent');
            $table->integer('attempts');
            $table->boolean('auth_confirmed');
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
        Schema::drop('patients');
    }
}
