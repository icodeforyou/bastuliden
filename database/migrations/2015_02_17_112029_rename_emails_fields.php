<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameEmailsFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('emails', function(Blueprint $table)
        {
            $table->dropColumn("email");
        });

        Schema::table('emails', function(Blueprint $table)
        {
            $table->mediumText("email_content");
            $table->string("subject")->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('emails', function(Blueprint $table)
        {
            $table->mediumText("email");
        });

        Schema::table('emails', function(Blueprint $table)
        {
            $table->dropColumn("email_content");
            $table->dropColumn("subject");
        });
	}

}
