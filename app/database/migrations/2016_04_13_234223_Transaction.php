<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaction extends Migration {

	public function up()
	{
		Schema::create("transactions",function($table){
				$table->increments("Id");
				$table->text("transaction_name");
				$table->text("transaction_details");
				
		});
	}

	public function down()
	{
		Schema::drop("transactions");
	}

}
