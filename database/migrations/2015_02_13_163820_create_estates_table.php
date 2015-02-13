<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("estates", function(Blueprint $table)
        {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("address")->nullable();
            $table->char("postalcode", 5)->nullable();
            $table->string("city")->nullable();
            $table->decimal("lat", 10, 8);
            $table->decimal("lon", 11, 8);
            $table->string("property_nbr")->nullable();
            $table->integer("connections")->default(1);
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
        Schema::drop("estates");
    }

}
