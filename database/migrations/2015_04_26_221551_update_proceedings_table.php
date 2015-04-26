<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProceedingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("proceedings", function(Blueprint $table)
        {
            $table->string("label")->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("proceedings", function(Blueprint $table)
        {
            $table->dropColumn("label");
            $table->dropSoftDeletes();
        });
    }

}
