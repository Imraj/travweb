<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("users",function($table){
			$table->increments('id');
			$table->string('fullName');
			$table->string('emailAddress');
			$table->string('phoneNumber');
			$table->string('password');
			$table->string('profile_path');
			$table->integer('priority_level')->references("id")->on("priorities");
		});

		Schema::create("priorities",function($table){
					$table->increments('id');
					$table->string('name');
					$table->string('value');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("users");
		Schema::drop("priorities");
	}

}
