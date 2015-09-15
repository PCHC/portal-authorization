<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmsToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
          $table->boolean('last_name_confirmed')->default(0)->after('last_name');
          $table->boolean('first_name_confirmed')->default(0)->after('first_name');
          $table->boolean('email_confirmed')->default(0)->after('email');
          $table->boolean('dob_confirmed')->default(0)->after('dob');
          $table->boolean('ssn_confirmed')->default(0)->after('ssn');
          $table->boolean('address_confirmed')->default(0)->after('address');
          $table->boolean('provider_confirmed')->default(0)->after('provider');
          $table->boolean('last_visit_confirmed')->default(0)->after('last_visit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn(['last_name_confirmed', 'first_name_confirmed', 'email_confirmed', 'dob_confirmed', 'ssn_confirmed', 'address_confirmed', 'provider_confirmed', 'last_visit_confirmed']);
        });
    }
}
