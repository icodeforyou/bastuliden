<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnusedFieldsFromUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn("postalCode");
            $table->dropColumn("address");
            $table->dropColumn("lat");
            $table->dropColumn("lon");
            $table->dropColumn("house_number");
            $table->dropColumn("signup_fee_paid");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
