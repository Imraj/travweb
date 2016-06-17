<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKinNamePhone extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("users",function($table){
			$table->string("next_of_kin_name");
			$table->string("next_of_kin_phoneNo");
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
			$table->dropColumn("next_of_kin_name");
			$table->dropColumn("next_of_kin_phoneNo");
		});
	}

}
