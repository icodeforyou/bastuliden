<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditAmountInPayments extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function(Blueprint $table)
        {
            $table->dropColumn("amount");
        });
        Schema::table('payments', function(Blueprint $table)
        {
            $table->decimal("amount", 8, 2);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function(Blueprint $table)
        {
            $table->dropColumn("amount");
            $table->decimal("amount", 5, 2);
        });
    }

}
