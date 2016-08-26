<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetCode extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("users",function($table){
			$table->string("password_reset_code");
			$table->string("remember_token");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("users",function($table){
			$table->dropColumn("password_reset_code");
			$table->dropColumn("remember_token");
		});
	}

}
