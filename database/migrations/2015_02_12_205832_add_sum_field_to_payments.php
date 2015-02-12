<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSumFieldToPayments extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function(Blueprint $table)
        {
            $table->decimal("amount", 5, 2);
            $table->dropColumn("payment_made");
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
        Schema::table('payments', function(Blueprint $table)
        {
            $table->dropColumn("amount", 5, 2);
            $table->timestamp("payment_made")->nullable();
            $table->dropTimestamps();
        });
    }

}
